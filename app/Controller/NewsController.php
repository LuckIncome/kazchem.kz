<?php
App::uses('CakeEmail', 'Network/Email');
class NewsController extends AppController{

	public $uses = array('News','Subscriber','Image');

	public function admin_index(){
		$this->News->locale = array('en', 'kz');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->News->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function subscribe(){
		
	}

	public function admin_add(){
		$email = new CakeEmail('smtp');
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->News->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->News->locale = 'en';
		}else{
			$this->News->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->News->create();

			$slug = Inflector::slug(mb_strtolower($this->request->data['News']['title']), '-');
			$data[] = $this->request->data['News'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}

			if(!isset($data['img2']['name']) || !$data['img2']['name']){
				unset($data['img2']);
			}
			//Проверка на уникальность alias	
			$check_alias = $this->News->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");

			$data_user = $this->Subscriber->find('all', array(
				'conditions' => array(
					// array('Subscriber.role' => 'user'),
					array('Subscriber.active' => '1')
				),
			));	
			// debug($data_user);die;

			if($this->News->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				$last_id = $this->News->getLastInsertId();
				$last_data = $this->News->findById($last_id);
				foreach ($data_user as $item ) {
					// debug($item);die;
					$email->from(array('st-kotel.kz@yandex.ru' => 'kazchem.kz'))
						->to($item['Subscriber']['email'])
						->subject('Опубликована новая новость на сайте kazchem.kz');
					$message = "На сайте kazchem.kz опубликована новая новость <a href='https://kazchem.kz/news/view/". $last_data['News']['id'] ."'>" . $last_data['News']['title'] . "</a>";
					
					$email->viewVars(array('content' => $message));
					$email->template('welcome','default');
					$email->emailFormat('html');
					$email->send($message);
				}

				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->News->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->News->locale = 'en';
		}else{
			$this->News->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->News->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->News->id = $id;
			$data1 = $this->request->data['News'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(empty($data1['img2']['name']) || !$data1['img2']['name']){
				unset($data1['img2']);
			}
			if($this->News->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$images = $this->Image->find('all', array(
				'conditions' => array(array('Image.page_id' => $id),array('Image.type' => 'news'))
			));
			$this->set(compact('id', 'data', 'images'));
		}
	}

	public function admin_delete($id){
		if (!$this->News->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->News->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->News->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('News.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->News->find('count') - 1;
		$paginator['count_pages'] = ceil($paginator['count'] / $paginator['per_page']);
		$paginator['start'] = '';
		$paginator['end'] = '';
		$paginator['prev'] = '';
		$paginator['next'] = '';


		if($paginator['current_page'] != 1 && $paginator['current_page'] != 2) {
			$paginator['start'] = 1;
		}
		if($paginator['current_page'] != 1 ) {
			$paginator['prev'] = $paginator['current_page'] - 1;
		}
		if($paginator['current_page'] != $paginator['count_pages'] ) {
			$paginator['next'] = $paginator['current_page'] + 1;
		}
		if($paginator['current_page'] != $paginator['count_pages'] && $paginator['current_page'] != $paginator['count_pages']-1) {
			$paginator['end'] = $paginator['count_pages'];
		}
		$data = $this->News->find('all', array(
			'order' => array('News.date DESC, News.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		$this->News->locale = Configure::read('Config.language');
		$data = $this->News->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_news = $this->News->find('all', array(
			'conditions' => array('News.id !=' => $id),
			'order' => array('News.date' => 'desc'),
			'limit' => 3,
		));
		$images = $this->Image->find('all', array(
			'conditions' => array('Image.page_id =' => $id),
			'order' => array('Image.id' => 'desc'),
			// 'limit' => 6,
		));
		$title_for_layout = $data['News']['title'];
		$meta['keywords'] = $data['News']['keywords'];
		$meta['description'] = $data['News']['description'];
		$meta['og_image'] = "news/" . $data['News']['img2'];
		$this->set(compact('data', 'title_for_layout', 'other_news', 'meta','images'));
	}

	
}