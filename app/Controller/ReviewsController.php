<?php

class ReviewsController extends AppController{
	public function admin_index(){
		$this->Review->locale = array('en', 'kz');
		$this->Review->bindTranslation(array('name' => 'titleTranslation', 'company' => 'companyTranslation'));
		$data = $this->Review->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Review->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Review->locale = 'en';
		}else{
			$this->Review->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Review->create();

			
			$data = $this->request->data['Review'];
		

			// debug($data);
			if(!$data['img']['name']){
			 	unset($data['img']);
			}
			
			if($this->Review->save($data)){
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
			$this->Review->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Review->locale = 'en';
		}else{
			$this->Review->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Review->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Review->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Review->id = $id;
			$data1 = $this->request->data['Review'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(empty($data1['inner_img']['name']) || !$data1['inner_img']['name']){
				unset($data1['inner_img']);
			}
			if($this->Review->save($data1)){
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
		if (!$this->Review->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Review->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Review->locale = Configure::read('Config.language');
		
		$title_for_layout = 'Отзывы';
		$data = $this->Review->find('all', array(
			'order' => array('Review.created' => 'desc')
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($id){
		$data = $this->Review->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_news = $this->Review->find('all', array(
			'conditions' => array('Review.id !=' => $id),
			'order' => array('Review.date' => 'desc'),
			'limit' => 6,
		));
		$title_for_layout = $data['Review']['title'];
		$meta['keywords'] = $data['Review']['keywords'];
		$meta['description'] = $data['Review']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_news', 'meta'));
	}

	
}