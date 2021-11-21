<?php
class TeamsController extends AppController{

	// public $uses = array('Team');

	public function admin_index(){
		$this->Team->locale = array('en', 'kz');
		$this->Team->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Team->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function subscribe(){
		
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Team->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Team->locale = 'en';
		}else{
			$this->Team->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Team->create();

			$data = $this->request->data['Team'];
			
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			
			if($this->Team->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Team->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Team->locale = 'en';
		}else{
			$this->Team->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Team->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Team->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Team->id = $id;
			$data1 = $this->request->data['Team'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Team->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$this->set(compact('id', 'data'));
		}
	}

	public function admin_delete($id){
		if (!$this->Team->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Team->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Team->locale = Configure::read('Config.language');
		$title_for_layout = 'Команда';
		$order = array('Team.id DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Team->find('count') - 1;
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
		$data = $this->Team->find('all', array(
			'order' => array('Team.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		$this->Team->locale = Configure::read('Config.language');
		$data = $this->Team->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		
		$title_for_layout = $data['Team']['title'];
		$meta['keywords'] = $data['Team']['keywords'];
		$meta['description'] = $data['Team']['description'];
		$this->set(compact('data', 'title_for_layout', 'meta'));
	}

	
}