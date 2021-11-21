<?php

class CropsController extends AppController{
	public function admin_index(){
		// $this->Crop->locale = array('en', 'kz');
		// $this->Crop->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Crop->find('all', array(
			'order' => array('id' => 'desc')
		));
		$title_for_layout = 'Культуры';
		$this->set(compact('data','title_for_layout'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Crop->locale = 'kz';
			$l = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Crop->locale = 'en';
			$l = 'en';
		}else{
			$this->Crop->locale = 'ru';
			$l = 'ru';
		}
		if($this->request->is('post')){
			$this->Crop->create();

			$data = $this->request->data['Crop'];
			
			if($this->Crop->save($data)){
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
			$this->Crop->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Crop->locale = 'en';
		}else{
			$this->Crop->locale = 'ru';
		}
		$l = $this->Crop->locale;
		if(is_null($id) || !(int)$id || !$this->Crop->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Crop->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Crop->id = $id;
			$data1 = $this->request->data['Crop'];
		
			if($this->Crop->save($data1)){
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
		if (!$this->Crop->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Crop->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Crop->locale = Configure::read('Config.language');
		$title_for_layout = 'Новости';
		$order = array('Crop.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Crop->find('count') - 1;
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
		$data = $this->Crop->find('all', array(
			'order' => array('Crop.date DESC, Crop.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		// debug($crop);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		$this->Crop->locale = Configure::read('Config.language');
		$data = $this->Crop->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_crop = $this->Crop->find('all', array(
			'conditions' => array('Crop.id !=' => $id),
			'order' => array('Crop.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Crop']['title'];
		$meta['keywords'] = $data['Crop']['keywords'];
		$meta['description'] = $data['Crop']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_crop', 'meta'));
	}

	
}