<?php
App::uses('CakeEmail', 'Network/Email');

class StaticPagesController extends AppController {
	
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index($page_alias = null){
		$this->StaticPage->locale = Configure::read('Config.language');
		$data = $this->StaticPage->findByAlias($page_alias);
		
		$title_for_layout = __('Главная');
		// $meta['keywords'] = $page['StaticPage']['keywords'];
		// $meta['description'] = $page['StaticPage']['description'];
		$this->set(compact('title_for_layout', 'meta', 'data'));
	}    

	public function view($page_alias = null){
		$this->StaticPage->locale = Configure::read('Config.language');
		// $this->StaticPage->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$page = $this->StaticPage->findByAlias($page_alias);
		
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}

		$page_id = $page['StaticPage']['id'];

		$title_for_layout = $page['StaticPage']['title'];
		$meta['keywords'] = $page['StaticPage']['keywords'];
		$meta['description'] = $page['StaticPage']['description'];
		$is_admin = $this->Auth->user();
		$this->set(compact('page_alias', 'page', 'title_for_layout', 'meta'));
	}

	protected function __find_parent($id){
		$parent_page = $this->StaticPage->findById($id);
		
		return $parent_page;
	}
	

	public function admin_index(){
		$this->StaticPage->locale = array('kz', 'ru', 'en');
		$this->StaticPage->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->StaticPage->find('all', array(
			// 'recursive' => -1,
			// 'fields' => array('id', 'title', 'alias')
		));
		// debug($data);
		$count_pages = count($data);
		
		$this->set(compact('data', 'count_pages'));
	}

	public function admin_edit($page_id){
		
		if(is_null($page_id) || !(int)$page_id || !$this->StaticPage->exists($page_id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->StaticPage->findById($page_id);
		if(!$page_id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->StaticPage->id = $page_id;
			// $this->StaticPage->locale = Configure::read('Config.languages');
			// debug($this->StaticPage->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['StaticPage'];

			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->StaticPage->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->StaticPage->locale = 'en';
			}else{
				$this->StaticPage->locale = 'ru';
			}
			// $this->StaticPage->locale = 'kz';
			// debug($data1);
			$data1['id'] = $page_id;
			if($this->StaticPage->save($data1)){
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
			$this->StaticPage->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->StaticPage->read(null, $page_id);
		}
		$list = $this->StaticPage->find('list', array(
			//'conditions' => array('StaticPage.parent_id' => 0)
		));
		
			$this->set(compact('page_id', 'data', 'list'));


	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->StaticPage->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->StaticPage->locale = 'en';
			}else{
				$this->StaticPage->locale = 'ru';
			}
		if($this->request->is('post')){
			$this->StaticPage->create();
			$data = $this->request->data['StaticPage'];
			// debug($data);
			// if(empty($data['img']['name'])){
			// 	$data['img']['name'] = 'empty';
			// 	$data['img']['tmp_name'] = 'empty';
			// }
			
			// if(!isset($data['img']['name']) || !$data['img']['name']){
			// 	$data['img'] = 'emtpy';
			// 	$this->StaticPage->validator()->remove('img');
			// }
			
			//Создаем alias
			$slug = Inflector::slug(mb_strtolower($this->request->data['StaticPage']['title']), '-');
			$data[] = $this->request->data['StaticPage'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			// debug($data);

			//Проверка на уникальность alias	
			$check_alias = $this->StaticPage->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");
				
			
			if($this->StaticPage->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				
				$new_page = $this->StaticPage->findByAlias($data['alias']);
				return $this->redirect($this->referer());
				// $redirect_url = '/admin/pages/edit/'.$new_page['StaticPage']['id'].'?lang=ru';
				// return $this->redirect($redirect_url);
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$list = $this->StaticPage->find('list', array(
			//'conditions' => array('StaticPage.parent_id' => 0)
		));
		$this->set(compact('list'));
	}

	public function map(){
		// $this->response->disableCache();
		// $lang = Configure::read('Config.language');
		// $this->StaticPage->bindTranslation(array('title' => 'titleTranslation'));
		// $this->News->locale = Configure::read('Config.language');
		
		$pages_tree = $this->StaticPage->find('threaded', array(
			// 'fields' => array('title', 'parent_id')
			// 'conditions' => array('StaticPage.hide_on_map !=' => 1),
			'order' => array('StaticPage.id' => 'ASC'),
			'fields' => array('id','title','alias','parent_id','hide_on_map'),
			'conditions' => array('StaticPage.hide_on_map !=' => 1),
			'reqursive' => -1
		));
		
		// $pages_tree = $this->StaticPage->query($sql);
		// debug($pages_tree);
		$pages = $this->_catMenuHtml($pages_tree);
		// $news = $this->News->find('all', array(
		// 	'order' => array('News.date' => 'desc'),
		// 	'conditions' => array()
		// ));
		// debug($news);
		// die;
		$this->set(compact('pages', 'pages_tree', 'news'));
		
	}

	protected function _catMenuHtml($pages_tree = false){
		if(!$pages_tree) return false;
		$html = '';
		foreach ($pages_tree as $item) {
			$html .= $this->_catMenuTemplate($item);
		}
		return $html;
	}

	protected function _catMenuTemplate($services1){
		ob_start();
		include APP . "View/Elements/map_tpl.ctp";
		return ob_get_clean();
	}

	public function admin_delete($id){
		if (!$this->StaticPage->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->StaticPage->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function meshit_tynysy(){
		$this->StaticPage->locale = Configure::read('Config.language');
		$this->News->locale = Configure::read('Config.language');
		$this->Leadership->locale = Configure::read('Config.language');
		$news = $this->News->find('all', array(
			'conditions' => array('News.category_id' => 9),
			'order' => array('News.date' => 'DESC'),
			'limit' => 5
		));
		$leaderships = $this->Leadership->find('all', array(
			'order' => array('Leadership.priority' => 'ASC')
		));

		$data = $this->StaticPage->findById(1);
		$this->set(compact('news', 'leaderships', 'data'));
	}

}
