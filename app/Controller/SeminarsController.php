<?php

class SeminarsController extends AppController{
	public function admin_index(){
		$this->Seminar->locale = array('en', 'kz');
		$this->Seminar->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Seminar->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function subscribe(){
		
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Seminar->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Seminar->locale = 'en';
		}else{
			$this->Seminar->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Seminar->create();

			

			$slug = Inflector::slug(mb_strtolower($this->request->data['Seminar']['title']), '-');
			$data[] = $this->request->data['Seminar'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if(!isset($data['img2']['name']) || !$data['img2']['name']){
				unset($data['img2']);
			}
			//Проверка на уникальность alias	
			$check_alias = $this->Seminar->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");
			
			if($this->Seminar->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Seminar->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Seminar->locale = 'en';
		}else{
			$this->Seminar->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Seminar->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Seminar->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Seminar->id = $id;
			$data1 = $this->request->data['Seminar'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(!isset($data1['img2']['name']) || !$data1['img2']['name']){
				unset($data1['img2']);
			}
			if($this->Seminar->save($data1)){
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
		if (!$this->Seminar->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Seminar->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$this->Seminar->locale = Configure::read('Config.language');
		$title_for_layout = 'Семинары';
		$order = array('Seminar.date DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Seminar->find('count') - 1;
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
		$data = $this->Seminar->find('all', array(
			'order' => array(array('Seminar.date DESC'), array('Seminar.id DESC')),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$this->Seminar->locale = Configure::read('Config.language');
		$data = $this->Seminar->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_news = $this->Seminar->find('all', array(
			'conditions' => array('Seminar.id !=' => $id),
			'order' => array('Seminar.date' => 'desc'),
			'limit' => 1,
		));
		$title_for_layout = $data['Seminar']['title'];
		$meta['keywords'] = $data['Seminar']['keywords'];
		$meta['description'] = $data['Seminar']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_news', 'meta'));
	}

	
}