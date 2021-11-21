<?php

App::uses('CakeEmail', 'Network/Email');

class RequestsController extends AppController {

	// public $uses = array('Request', 'Banner');
	public function beforeFilter(){
		parent::beforeFilter();
	}
	public $helpers = array('Html', 'Form', 'Session');

	public function admin_index(){
		$data = $this->Request->find('all', array('order' => array('Request.id' => 'desc')));
		
		$this->set(compact('data'));
	}
	
	// public function send(){
	// $this->autoRender = false;

	// if($this->request->is('post')){
		
	// 	$data = $this->request->data['Request'];

	// 	$email = new CakeEmail('smtp');
		
	// 	$email->from(array('st-kotel.kz@yandex.ru' => 'lkassa.kz'))
	// 	->to('info@lkassa.kz')
	// 	->subject('Новое письмо с сайта'. date("YmdHis"));
	// 	$message = 'Заказали обратный звонок с сайта lkassa.kz, номер телефона: ' . $data['phone'];
		
	// 	if( $email->send($message) ){
		
	// 		$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер. Спасибо!', 'default', array(), 'good');
	// 		return $this->redirect($this->referer());
	// 	}else{
	// 		$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
	// 		debug($message);die;
	// 		return $this->redirect($this->referer());
	// 	}
	
		
	// }
	
// }
	public function send(){
		
		$this->autoRender = false;
		if($this->request->is('post')){
			$data['name'] = '';
			$data['phone'] = '';
			$data['email'] = '';
			$data['question'] = '';
			$data = $this->request->data['Request'];
			
			// debug($data);die;
			$email = new CakeEmail('smtp');
			
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to('sales@kazchem.kz')->subject('Новое письмо с сайта');
			
			$message = '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '</p>' . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Вопрос:</b> ' . $data['question'] . '</p>' . '<p><b>Страница:</b> ' . $data['page'] . '</p>';
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			
			
			if($email->send($message)){
			// if($this->Basket->save($data)){
				$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер', 'default', array(), 'good');
				return $this->redirect("/");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			
			
			
		}
	}

	public function agroconsulting(){
		
		$this->autoRender = false;
		if($this->request->is('post')){
			$data['name'] = '';
			$data['phone'] = '';
			$data['email'] = '';
			$data['question'] = '';
			$data['page'] = '';
			$data = $this->request->data['Request'];
			
			// debug($data);die;
			$email = new CakeEmail('smtp');
			//madinakazchem@yandex.kz
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to('madinakazchem@yandex.kz')->subject('Новое письмо с сайта');
			
			$message = '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '</p>' . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Вопрос:</b> ' . $data['question'] . '</p>' . '<p><b>Страница:</b> ' . $data['page'] . '</p>';
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			
			
			if($email->send($message)){
			// if($this->Basket->save($data)){
				$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер', 'default', array(), 'good');
				return $this->redirect("/");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			
			
			
		}
	}

	public function agrocalc(){
		
		$this->autoRender = false;
		if($this->request->is('post')){
			$data['name'] = '';
			$data['phone'] = '';
			$data['email'] = '';
			$data['question'] = '';
			$data['data'] = '';
			$data = $this->request->data['Request'];
			
			// debug($data);die;
			$email = new CakeEmail('smtp');
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to('agronom2@kazchem.kz')->subject('Новое письмо с сайта - Агрокалькулятор');
			
			$message = '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '</p>' . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Вопрос:</b> ' . $data['question'] . '</p>' . '<p><b>Страница:</b> ' . $data['page'] . '</p>' . $data['data'];
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			
			
			if($email->send($message)){
			// if($this->Basket->save($data)){
				$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер', 'default', array(), 'good');
				return $this->redirect("/");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			
			
			
		}
	}

	public function transportation(){
		
		$this->autoRender = false;
		if($this->request->is('post')){
			$data['name'] = '';
			$data['phone'] = '';
			$data['email'] = '';
			$data['data'] = '';
			$data = $this->request->data['Request'];
			
			// debug($data);die;
			
			$mail = array('sales@kazchem.kz', 'logistics@kazchem.kz', 'office@kazchem.kz');
			$email = new CakeEmail('smtp');
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to($mail)->subject('Рассчет стоимости перевозки груза');
			
			$message = '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '</p>' . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Страница:</b> ' . $data['page'] . '</p>' . $data['data'];
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			
			if($email->send($message)){
			// if($this->Basket->save($data)){
				$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер', 'default', array(), 'good');
				return $this->redirect("/");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	
	public function how_to_buy(){
		
		$this->autoRender = false;
		if($this->request->is('post')){
			$data['name'] = '';
			$data['phone'] = '';
			$data['email'] = '';
			$data['question'] = '';
			$data['program'] = '';
			$data = $this->request->data['Request'];
			
			// debug($data);die;
			
			//$mail = array('sales@kazchem.kz', 'logistics@kazchem.kz', 'office@kazchem.kz');
			$email = new CakeEmail('smtp');
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to('sales@kazchem.kz')->subject('Как купить?');
			
			$message = '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '</p>' . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Вопрос:</b> ' . $data['question'] . '</p>' . '<p><b>Программа:</b> ' . $data['program'] . '</p>';
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			
			if($email->send($message)){
			// if($this->Basket->save($data)){
				$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер', 'default', array(), 'good');
				return $this->redirect("/");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function seminar(){
		
		$this->autoRender = false;
		if($this->request->is('post')){
			$data['name'] = '';
			$data['phone'] = '';
			$data['email'] = '';
			$data['company'] = '';
			$data['page'] = '';
			$data = $this->request->data['Request'];
			
			// debug($data);die;
			$emails = array('marketing@kazchem.kz', 'agronom2@kazchem.kz');
			$email = new CakeEmail('smtp');
			
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to($emails)->subject('Запись на семинар: ' . $data['page']);
			
			$message = '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '</p>' . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Компания:</b> ' . $data['company'] . '</p>' . '<p><b>Страница:</b> ' . $data['page'] . '</p>';
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			
			
			if($email->send($message)){
			// if($this->Basket->save($data)){
				$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер', 'default', array(), 'good');
				// return $this->redirect("/");
				return $this->redirect($this->referer());
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			
			
			
		}
	}

	public function share(){
		
		$this->autoRender = false;
		if($this->request->is('post')){
			$data['name'] = '';
			$data['phone'] = '';
			$data['email'] = '';
			$data['company'] = '';
			$data['page'] = '';
			$data = $this->request->data['Request'];
			
			// debug($data);die;
			$emails = array('marketing@kazchem.kz', 'agronom2@kazchem.kz');
			$email = new CakeEmail('smtp');
			
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to($emails)->subject('Заявка на акцию : ' . $data['page']);
			
			$message = '<p><b>Имя:</b> ' . $data['name'] . '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '</p>' . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Компания:</b> ' . $data['company'] . '</p>' . '<p><b>Страница:</b> ' . $data['page'] . '</p>';
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			
			
			if($email->send($message)){
			// if($this->Basket->save($data)){
				$this->Session->setFlash('Заявка успешно отправлена, в ближайшее время с Вами свяжется наш менеджер', 'default', array(), 'good');
				// return $this->redirect("/");
				return $this->redirect($this->referer());
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			
			
			
		}
	}
}