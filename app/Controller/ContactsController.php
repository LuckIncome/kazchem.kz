<?php

class ContactsController extends AppController{
	//public $uses = array('Contact', 'Product');
	//public $components = array('Paginator');

	public function admin_index(){
		$data = $this->Contact->find('all');
		$this->set(compact('data'));
	}

	public function index($alias = null){
		//$data = $this->Contact->findByAlias($alias);
		// debug($this->request->params['pass'][1]);
		if(isset($this->request->params['pass'][1]) && !empty($this->request->params['pass'][1])){
			$data = $this->Category->find('all', array(
				'recursive' => -1,
				'conditions' => array('Contact.alias' => 'astana'),
			));
			debug($data);
			//$user_id = $data['Category']['user_id'];
			// debug($user_id);
			//$ui = $this->Contact->Category->User->findById($user_id);
		}
		return $this->set(compact('data', 'ui'));
	}

	public function view($alias){
		$data = $this->Contact->findByAlias($alias);
		if (!$data) {
			throw new NotFounddException('Такой категории не существует');
		}
		// debug($data);
		return $this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			
			$this->Contact->create();
			$data = $this->request->data['Contact'];
			
			if($this->Contact->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		// $c_list = $this->Contact->find('list');
		// return $this->set(compact('c_list'));

	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Contact->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Contact->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Contact->id = $id;
			$data1 = $this->request->data['Contact'];
			
			
			if($this->Contact->save($data1)){
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
		if (!$this->Contact->exists($id)) {
			throw new NotFounddException('Такой категории нету');
		}
		if($this->Contact->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}