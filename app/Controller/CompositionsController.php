<?php

class CompositionsController extends AppController{
	public function admin_index(){
		$this->Composition->locale = array('en', 'kz');
		$this->Composition->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Composition->find('all', array(
			'order' => array('id' => 'desc')
		));
		$title_for_layout = 'Виды продукта';
		
		$this->set(compact('data','title_for_layout'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Composition->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Composition->locale = 'en';
		}else{
			$this->Composition->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Composition->create();

			$data = $this->request->data['Composition'];
			
			if($this->Composition->save($data)){
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
			$this->Composition->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Composition->locale = 'en';
		}else{
			$this->Composition->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Composition->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Composition->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Composition->id = $id;
			$data1 = $this->request->data['Composition'];
		
			if($this->Composition->save($data1)){
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
		if (!$this->Composition->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Composition->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Composition->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Composition.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Composition->find('count') - 1;
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
		$data = $this->Composition->find('all', array(
			'order' => array('Composition.date DESC, Composition.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		// debug($viewproduct);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		$this->Composition->locale = Configure::read('Config.language');
		$data = $this->Composition->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_viewproduct = $this->Composition->find('all', array(
			'conditions' => array('Composition.id !=' => $id),
			'order' => array('Composition.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Composition']['title'];
		$meta['keywords'] = $data['Composition']['keywords'];
		$meta['description'] = $data['Composition']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_viewproduct', 'meta'));
	}

	
}