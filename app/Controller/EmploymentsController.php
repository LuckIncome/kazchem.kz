<?php

class EmploymentsController extends AppController{
	public function admin_index(){
		$this->Employment->locale = array('en', 'kz');
		$this->Employment->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Employment->find('all', array(
			'order' => array('id' => 'desc')
		));
		$title_for_layout = 'Виды продукта';
		
		$this->set(compact('data','title_for_layout'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Employment->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Employment->locale = 'en';
		}else{
			$this->Employment->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Employment->create();

			$data = $this->request->data['Employment'];
			
			if($this->Employment->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$title_for_layout = 'Добавление';
		
		$this->set(compact('data','title_for_layout'));
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Employment->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Employment->locale = 'en';
		}else{
			$this->Employment->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Employment->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Employment->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Employment->id = $id;
			$data1 = $this->request->data['Employment'];
		
			if($this->Employment->save($data1)){
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
			
			$this->set(compact('id', 'data','title_for_layout'));
		}
	}

	public function admin_delete($id){
		if (!$this->Employment->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Employment->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Employment->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Employment.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Employment->find('count') - 1;
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
		$data = $this->Employment->find('all', array(
			'order' => array('Employment.date DESC, Employment.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		// debug($viewproduct);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		$this->Employment->locale = Configure::read('Config.language');
		$data = $this->Employment->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_viewproduct = $this->Employment->find('all', array(
			'conditions' => array('Employment.id !=' => $id),
			'order' => array('Employment.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Employment']['title'];
		$meta['keywords'] = $data['Employment']['keywords'];
		$meta['description'] = $data['Employment']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_viewproduct', 'meta'));
	}

	
}