<?php

class ManufacturersController extends AppController{
	public function admin_index(){
		// $this->Manufacturer->locale = array('en', 'kz');
		// $this->Manufacturer->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Manufacturer->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		// if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
		// 	$this->Manufacturer->locale = 'kz';
		// }elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
		// 	$this->Manufacturer->locale = 'en';
		// }else{
		// 	$this->Manufacturer->locale = 'ru';
		// }
		if($this->request->is('post')){
			$this->Manufacturer->create();

			
			$data = $this->request->data['Manufacturer'];
			
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if($this->Manufacturer->save($data)){
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
			$this->Manufacturer->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Manufacturer->locale = 'en';
		}else{
			$this->Manufacturer->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Manufacturer->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Manufacturer->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Manufacturer->id = $id;
			$data1 = $this->request->data['Manufacturer'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Manufacturer->save($data1)){
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
		if (!$this->Manufacturer->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Manufacturer->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		$this->Manufacturer->locale = Configure::read('Config.language');
		$title_for_layout = 'Услуги';
		$data = $this->Manufacturer->find('all', array(
			'order' => array('Manufacturer.date' => 'desc')
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($id){
		$data = $this->Manufacturer->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		$manufacturers = $this->Manufacturer->find('all');
		$other_projects = $this->Manufacturer->find('all', array(
			'conditions' => array('Manufacturer.id !=' => $id),
			'order' => array('Manufacturer.date' => 'desc'),
			'limit' => 4
		));
		$title_for_layout = $data['Manufacturer']['title'];
		$meta['keywords'] = $data['Manufacturer']['keywords'];
		$meta['description'] = $data['Manufacturer']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_projects', 'meta','manufacturers'));
	}

	
}