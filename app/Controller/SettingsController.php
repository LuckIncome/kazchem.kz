<?php

class SettingsController extends AppController{

	public $uses = array('Setting', 'Slide', 'Product', 'Styleguide');

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){

		// $main_page = 1;
		$slides = $this->Slide->find('all');
		$bestsellers = $this->Product->find('all', array(
			'conditions' => array('Product.bestseller' => 1, 'Product.active' => 1),
			'order' => array('Product.id' => 'desc')
		));
		$styleguides = $this->Styleguide->find('all', array(
			'order' => array('Styleguide.id' => 'desc'),
			'limit' => 3
		));
		$data = $this->Setting->findById(1);
		
		

		// debug($data);
		// die;
		$title_for_layout = $data['Setting']['seo-main-title'];
		$meta['keywords'] = $data['Setting']['seo-main-keywords'];
		$meta['description'] = $data['Setting']['seo-main-description'];
		$this->set(compact('title_for_layout', 'data', 'meta', 'slides', 'bestsellers', 'styleguides'));
	}

	public function admin_index(){
		$data = $this->Setting->find('all');
		$title_for_layout = "Настройки";
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Setting->create();
			$data = $this->request->data['Setting'];
			if($this->Setting->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
			// $this->Setting->Category->locale = 'ru';
			// $categories = $this->Setting->Category->find('list');
			// $this->set(compact('categories'));
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Setting->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Setting->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Setting->id = $id;
			$data1 = $this->request->data['Setting'];
			
			$data1['id'] = $id;
			
			if($this->Setting->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$data = $this->request->data = $this->Setting->read(null, $id);
		}
			
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->Setting->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Setting->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		// if(is_null($id) || !(int)$id || !$this->Setting->exists($id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		
		$data = $this->Setting->findById($id);
	// $aside = $this->Setting->Category->find('all');
		$title_for_layout = $data['Setting']['title'];
		$meta['keywords'] = $data['Setting']['keywords'];
		$meta['description'] = $data['Setting']['description'];
		$this->set(compact('data', '','title_for_layout' ,'meta'));
	}

	public function about(){
		$this->layout = 'about';
		// $questions = $this->Question->find('all');
		// die();
		// $data = $this->Setting->findById(1);
		$title_for_layout = "О компании";
		$this->set(compact('title_for_layout', 'data', 'meta', 'questions'));
	}

	public function gold_request1(){
		$this->layout = 'gold_request1';
	}
	public function gold_request2(){
		$this->layout = 'gold_request2';
	}
	public function gold_request3(){
		$this->layout = 'gold_request3';
		$data = $this->Setting->findById(1);
		$title_for_layout = 'Заявка - Мои данные';
		$this->set(compact('title_for_layout', 'data', 'meta'));
	}

}