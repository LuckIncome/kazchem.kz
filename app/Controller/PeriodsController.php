<?php

class PeriodsController extends AppController{
	public function admin_index(){
		// $this->Period->locale = array('en', 'kz');
		// $this->Period->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Period->find('all', array(
			'order' => array('id' => 'desc')
		));
		$title_for_layout = 'Период внесения';
		$this->set(compact('data','title_for_layout'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Period->locale = 'kz';
			$l = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Period->locale = 'en';
			$l = 'en';
		}else{
			$this->Period->locale = 'ru';
			$l = 'ru';
		}
		if($this->request->is('post')){
			$this->Period->create();

			$data = $this->request->data['Period'];
			
			if($this->Period->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$title_for_layout = 'Добавление';
		
		$this->set(compact('data','title_for_layout', 'l'));
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Period->locale = 'kz';
			$l = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Period->locale = 'en';
			$l = 'en';
		}else{
			$this->Period->locale = 'ru';
			$l = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Period->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Period->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Period->id = $id;
			$data1 = $this->request->data['Period'];
		
			if($this->Period->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$title_for_layout = 'Редактирование';
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			
			$this->set(compact('id', 'data','title_for_layout', 'l'));
		}
	}

	public function admin_delete($id){
		if (!$this->Period->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Period->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Period->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Period.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Period->find('count') - 1;
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
		$data = $this->Period->find('all', array(
			'order' => array('Period.date DESC, Period.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		// debug($period);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		$this->Period->locale = Configure::read('Config.language');
		$data = $this->Period->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_period = $this->Period->find('all', array(
			'conditions' => array('Period.id !=' => $id),
			'order' => array('Period.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Period']['title'];
		$meta['keywords'] = $data['Period']['keywords'];
		$meta['description'] = $data['Period']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_period', 'meta'));
	}

	
}