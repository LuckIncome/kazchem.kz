<?php
App::uses('CakeEmail', 'Network/Email');
class PartnersController extends AppController{
	
	public function admin_index(){
		$this->Partner->locale = array('en', 'kz');
		$this->Partner->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Partner->find('all');
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Partner->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Partner->locale = 'en';
		}else{
			$this->Partner->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->Partner->create();
			$data = $this->request->data['Partner'];
			if(empty($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if($this->Partner->save($data)){
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
			$this->Partner->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Partner->locale = 'en';
		}else{
			$this->Partner->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Partner->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Partner->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Partner->id = $id;
			$data1 = $this->request->data['Partner'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Partner->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование';
			$this->set(compact('id', 'data', 'title_for_layout'));
		}
	}

	public function admin_delete($id){
		if (!$this->Partner->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Partner->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
	public function index(){
		$this->Partner->locale = Configure::read('Config.language');
		$partners = $this->Partner->find('all');
		$title_for_layout = __('Партнеры');
		$this->set(compact('partners', 'title_for_layout'));
	}
	public function send(){
		
		
		if($this->request->is('post')){
			$data = $this->request->data['Partner'];
			// После заполнение area саином включить почту
			$recipient = array('sales@kazchem');
		
			
			$email = new CakeEmail('smtp');
			
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to('office@kazchem.kz')->subject('Новое письмо с сайта');
			$message = '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Название компании:</b> ' . $data['company'] . '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Сообщение:</b> ' . $data['message'] . '</p>';
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			//после настройки почты $email->send($message)
			
			if($email->send($message)){
				$this->Session->setFlash('Спасибо ваша заявка принята! <br>', 'default', array(), 'good');
				return $this->redirect("/partners");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			
			
			
		}
	}
}