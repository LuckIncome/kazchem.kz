<?php

class ServicesController extends AppController{
	public $uses = array('Product','Service');
	public function admin_index(){
		$data = $this->Service->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function agroconsulting(){
		$title_for_layout = __('Агроконсалтинг');
		$this->set(compact('title_for_layout'));
	}

	public function delivery_calc(){
		$this->Product->locale = Configure::read('Config.language');
		$products = $this->Product->find('all');
		$title_for_layout = __('Рассчет стимости доставки');
		$this->set(compact('title_for_layout','products'));
	}

	public function subsiding(){
		$title_for_layout = __('Субсидирование');
		$this->set(compact('title_for_layout'));
	}

	public function transportation(){
		$title_for_layout = __('Транспортировка');
		$this->set(compact('title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Service->create();

			$slug = Inflector::slug($this->request->data['Service']['title']);
			$slug = mb_strtolower($slug);
			$data[] = $this->request->data['Service'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Service->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Service->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Service->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Service->id = $id;
			$data1 = $this->request->data['Service'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Service->save($data1)){
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
		if (!$this->Service->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Service->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		
		$title_for_layout = 'Услуги';
		$data = $this->Service->find('all', array(
			'order' => array('Service.date' => 'desc')
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($id){
		$data = $this->Service->findById($id);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}
		$services = $this->Service->find('all');
		$other_projects = $this->Service->find('all', array(
			'conditions' => array('Service.id !=' => $id),
			'order' => array('Service.date' => 'desc'),
			'limit' => 4
		));
		$title_for_layout = $data['Service']['title'];
		$meta['keywords'] = $data['Service']['keywords'];
		$meta['description'] = $data['Service']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_projects', 'meta','services'));
	}

	
}