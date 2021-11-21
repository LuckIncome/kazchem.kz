<?php

class VideosController extends AppController{
	public function admin_index(){
		$type = $_GET['type'];
		$this->Video->locale = array('en', 'kz');
		$this->Video->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Video->find('all', array(
			'conditions' => array('Video.type' => $type),
			'order' => array('id' => 'desc')
		));

		$this->set(compact('data'));
	}

	public function subscribe(){

	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Video->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Video->locale = 'en';
		}else{
			$this->Video->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Video->create();



			$data = $this->request->data['Video'];
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if($this->Video->save($data)){
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
			$this->Video->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Video->locale = 'en';
		}else{
			$this->Video->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Video->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Video->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Video->id = $id;
			$data1 = $this->request->data['Video'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(empty($data1['inner_img']['name']) || !$data1['inner_img']['name']){
				unset($data1['inner_img']);
			}
			if($this->Video->save($data1)){
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
		if (!$this->Video->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Video->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Video->locale = Configure::read('Config.language');
		$title_for_layout = 'Мои видеозаписи';
		$order = array('Video.id DESC');
		$paginator = array();
		$paginator['per_page'] = 6;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Video->find('count') - 1;
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
		$data = $this->Video->find('all', array(
			'conditions' => array('Video.type' => 'Видео'),
			'order' => array('Video.id'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		$this->Video->locale = Configure::read('Config.language');
		$data = $this->Video->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_news = $this->Video->find('all', array(
			'conditions' => array('Video.id !=' => $id),
			'order' => array('Video.id' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Video']['title'];
		$meta['keywords'] = $data['Video']['keywords'];
		$meta['description'] = $data['Video']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_news', 'meta'));
	}


}
