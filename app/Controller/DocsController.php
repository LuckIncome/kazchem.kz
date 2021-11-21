<?php

class DocsController extends AppController{

	// public $components = array('Paginator');
	public $uses = array('Doc');
	// public function beforeFilter(){
	// 	parent::beforeFilter();
	// }

	public function index(){
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$this->Doc->locale = Configure::read('Config.language');
		$l = Configure::read('Config.language');
		// $this->Doc->Category->locale = Configure::read('Config.language');
		$this->Doc->bindTranslation(array('title' => 'titleTranslation'));

		$title_for_layout = __('Медиатека');
		$class = 'blog-page';
		$this->set(compact('title_for_layout', 'data', 'l'));

		$paginator = array();
		$paginator['per_page'] = 12;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Doc->find('count') - 1;
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

		$data = $this->Doc->find('all', array(
			'order' => array('Doc.id'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
			// 'limit' => 12,
		));
		$title_for_layout = __('Мои документы');
		$class = 'blog-page';
		$this->set(compact('title_for_layout', 'data', 'l', 'paginator'));
//		$this->set(compact('data', 'title_for_layout','paginator'));
		//сортировка по кол-ву просмотров
		// if(isset($this->request->query['order']) && $this->request->query['order'] == 'views'){
		// 	uasort($data, array($this, 'sortByView'));
		// }
		// debug($data);die;

	}

	public function admin_index(){

		if(isset($_GET['type']) && !empty($_GET['type'])){
			$type = $_GET['type'];
			// debug($type);
			//$conditions = array('conditions' => array('Doc.type' => $type));
		}else{
			$type = '';
		}
		// debug($conditions);
		$this->Doc->locale = array('ru', 'kz', 'en');
		$this->Doc->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Doc->find('all', array(
			'conditions' => array('Doc.type' => $type),
			'order' => array('Doc.id' => 'desc'),

			));

		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Doc->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Doc->locale = 'en';
			}else{
				$this->Doc->locale = 'ru';
			}
		if($this->request->is('post')){
			$this->Doc->create();
			$data = $this->request->data['Doc'];



			// $slug = Inflector::slug(mb_strtolower($this->request->data['Doc']['title']), '-');
			// $data[] = $this->request->data['Doc'];
			// $data[] = array('alias'=>$slug);
			// $data = array_merge($data[0],$data[1]);
			if(!isset($data['img']['name']) || empty($data['img']['name'])){
				unset($data['img']);
			}
			if(!isset($data['doc_ru']['name']) || empty($data['doc_ru']['name'])){
				unset($data['doc_ru']);
			}
			if(!isset($data['doc_kz']['name']) || empty($data['doc_kz']['name'])){
				unset($data['doc_kz']);
			}
			if(!isset($data['doc_en']['name']) || empty($data['doc_en']['name'])){
				unset($data['doc_en']);
			}

			//Проверка на уникальность alias
			// $check_alias = $this->Doc->findByAlias($data['alias']);
			// if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");


			// $this->Doc->locale = 'ru';
			if($this->Doc->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// $new_page = $this->Doc->findByAlias($data['alias']);

				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$title_for_layout = 'Добавление книги';
		// $this->Doc->Category->locale = 'ru';
		// $categories = $this->Doc->Category->find('list');
		$this->set(compact('title_for_layout', 'categories'));
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Doc->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Doc->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Doc->locale = 'en';
		}else{
			$this->Doc->locale = 'ru';
		}

		$data = $this->Doc->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Doc->id = $id;
			$data1 = $this->request->data['Doc'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(!isset($data1['doc_ru']['name']) || !$data1['doc_ru']['name']){
				unset($data1['doc_ru']);
			}
			if(!isset($data1['doc_kz']['name']) || !$data1['doc_kz']['name']){
				unset($data1['doc_kz']);
			}
			if(!isset($data1['doc_en']['name']) || !$data1['doc_en']['name']){
				unset($data1['doc_en']);
			}

			$data1['id'] = $id;

			if($this->Doc->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Doc->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Doc->read(null, $id);
		}
		// $this->Doc->Category->locale = 'ru';
		// $categories = $this->Doc->Category->find('list');
		$this->set(compact('id', 'data', 'categories'));

	}

	public function admin_delete($id){
		if (!$this->Doc->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Doc->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($alias){
		$this->Doc->locale = Configure::read('Config.language');

		$data = $this->Doc->findByAlias($alias);
		if(!$data){
			throw new NotFoundException("Такой страницы нету");
		}
		$id = $data['Doc']['id'];
		// $other_news = $this->Doc->find('all', array(
		// 	'conditions' => array('Doc.id !=' => $id),
		// 	'order' => array('Doc.date' => 'DESC'),
		// 	'limit' => 5
		// ));
		// debug($other_news);die;

		$this->Doc->query("UPDATE `documentaries` SET `views` = `views` + 1 WHERE `alias`='" . $alias . "'");
		$title_for_layout = ($data['Doc']['meta_title']) ? $data['Doc']['meta_title'] : $data['Doc']['title'];
		$meta['keywords'] = $data['Doc']['keywords'];
		$meta['description'] = $data['Doc']['description'];
		//$this->Doc->query("UPDATE `publications` SET `views` = `views` + 1 WHERE `id`='" . $id . "'");
		$class = 'blog-page';
		$this->set(compact('data','title_for_layout' ,'meta', 'class'));
	}

	public function search($id){

		$this->Doc->locale = Configure::read('Config.language');

		$data = $this->Doc->findByid($id);

		// debug($other_news);die;
		if(!$data){
			throw new NotFoundException("Такой страницы нету");
		}else{
			$link = '/' . $this->Doc->locale . '/news/view/' . $data['Doc']['alias'];
			// debug($link);die;
			return $this->redirect($link);
		}

	}

	public function sortByView($f1,$f2){
      if(count($f1['Doc']['views']) < count($f2['Doc']['views'])) return 1;
      elseif(count($f1['Doc']['views']) > count($f2['Doc']['views'])) return -1;
      else return 0;
   }

}
