<?php

class SharesController extends AppController{
	public function admin_index(){
		$this->Share->locale = array('en', 'kz');
		$this->Share->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Share->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Share->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Share->locale = 'en';
		}else{
			$this->Share->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Share->create();

			

			$slug = Inflector::slug(mb_strtolower($this->request->data['Share']['title']), '-');
			$data[] = $this->request->data['Share'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			if(!isset($data['img']['name']) || !$data['img']['name'] ){
				unset($data['img']);
			}
			if(!isset($data['img2']['name']) || !$data['img2']['name']){
				unset($data['img2']);
			}
			//Проверка на уникальность alias	
			$check_alias = $this->Share->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");
			
			if($this->Share->save($data)){
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
			$this->Share->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Share->locale = 'en';
		}else{
			$this->Share->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Share->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Share->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Share->id = $id;
			$data1 = $this->request->data['Share'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(empty($data1['img2']['name']) || !$data1['img2']['name']){
				unset($data1['img2']);
			}
			if(empty($data1['inner_img']['name']) || !$data1['inner_img']['name']){
				unset($data1['inner_img']);
			}
			if($this->Share->save($data1)){
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
		if (!$this->Share->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Share->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Share->locale = Configure::read('Config.language');
		$title_for_layout = __('Акции');
		$order = array('Share.id DESC');
		$paginator = array();
		$paginator['per_page'] = 9;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Share->find('count') - 1;
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
		$data = $this->Share->find('all', array(
			'order' => array('Share.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));
		if(count($data) < 9) {
			$paginator['next'] = '';
		}
		// debug($paginator['next']);
		$this->set(compact('data', 'title_for_layout','paginator'));
	}


	public function view($id){
		$this->Share->locale = Configure::read('Config.language');
		$data = $this->Share->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_shares = $this->Share->find('all', array(
			'conditions' => array('Share.id !=' => $id),
			'order' => array('Share.id' => 'desc'),
			'limit' => 3,
		));
		$title_for_layout = $data['Share']['title'];
		$meta['keywords'] = $data['Share']['keywords'];
		$meta['description'] = $data['Share']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_shares', 'meta'));
	}

	
}