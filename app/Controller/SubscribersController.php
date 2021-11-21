<?php
App::uses('CakeEmail', 'Network/Email');

class SubscribersController extends AppController{

	public function admin_index(){
		$data = $this->Subscriber->find('all', array(
			'order' => array('Subscriber.id' => 'DESC')
		));
		$title_for_layout = 'Подписчики';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Subscriber->create();
			$data = $this->request->data['Subscriber'];
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			if($this->Subscriber->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Subscriber->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Subscriber->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Subscriber->id = $id;
			$data1 = $this->request->data['Subscriber'];
			
			if($this->Subscriber->save($data1)){
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

	public function add(){
		if($this->request->is('post')){
			$email = new CakeEmail('smtp');
			$rand_number = rand(100000, 999999);
			$this->Subscriber->create();
			$data = $this->request->data['Subscriber'];
			$data['number'] = $rand_number;
			$username = $data['email'];
			$check_username = $this->Subscriber->find('first', array(
				'conditions' => array( array('Subscriber.email' => $username))
			));
			
			if(empty($check_username)){
				$email->from(array('info@kazchem.kz' => 'Подписка на сайт kazchem.kz'))
				->to($username)
				->subject('Активация почты');
				$message = '<p>Пройдите по ссылке, чтобы активировать подписку: https://kazchem.kz/subscribers/activate/'. $rand_number . '</p>';

				$email->viewVars(array('content' => $message));
				$email->template('welcome','default');
				$email->emailFormat('html');

				
				if($this->Subscriber->save($data) && $email->send($message)){
					$this->Session->setFlash('На Вашу почту отправлено письмо для активации.', 'default', array(), 'good');
					
					// debug($data);
					return $this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				}
			}else{
				if($check_username['Subscriber']['active'] == 1){ //уже есть и активный
					$this->Session->setFlash('Данный E-mail уже подписан.', 'default', array(), 'bad');
					return $this->redirect($this->referer());
				}else{ //Есть, но деактивированный
					$update = array('id' => $check_username['Subscriber']['id'], 'number' => $rand_number);
					$email->from(array('info@kazchem.kz' => 'Подписка на сайт kazchem.kz'))
					->to($username)
					->subject('Новые письмо с сайта');
					$message = 'Пройдите по ссылке, чтобы активировать подписку: https://kazchem.kz/subscribers/activate/'. $rand_number;
					
					if($this->Subscriber->save($update) && $email->send($message)){
						$this->Session->setFlash('На Вашу почту отправлено письмо для активации.', 'default', array(), 'good');
						return $this->redirect($this->referer());
					}
				}
			}

		}else{
			return $this->redirect("/");
		}
	}

	public function activate($rand_number){
		$this->autoRender = false;
		if(isset($rand_number) && !empty($rand_number)){
			$q = $this->Subscriber->find('first', array(
				'conditions' => array('Subscriber.number' => $rand_number)
			));
			// debug($q);die;
			if($q){
				$update = $this->Subscriber->query("UPDATE subscribers SET active=1 WHERE `number`='{$rand_number}'");
				$this->Session->setFlash('Вы успешно активировали свой E-mail, спасибо за подписку', 'default', array(), 'good');
				return $this->redirect("/");
			}else{
				$this->Session->setFlash('Ошибка, не верный код', 'default', array(), 'bad');
				return $this->redirect("/");
			}
		}else{
			$this->Session->setFlash('Ошибка активации', 'default', array(), 'bad');
			return $this->redirect("/");
		}
	}

	public function deactivate($id){
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data;
			$rand_number = $data['rand_number'];
			
			if(isset($rand_number) && !empty($rand_number)){
				$q = $this->Subscriber->find('first', array(
					'conditions' => array('Subscriber.number' => $rand_number)
				));
				
				if($q){
					$update = $this->Subscriber->query("UPDATE subscribers SET active=0, `number` = 0 WHERE `number`='{$rand_number}'");
					$text = "Вы успешно деактивировали свой E-mail, спасибо что были с нами. ";
					//<a href='/subscribers/activate/".$rand_number."'>Нет, я передумал</a>
					$this->Session->setFlash($text, 'default', array(), 'good');
					return $this->redirect("/");
				}
			}else{
				$this->Session->setFlash('Ошибка деактивации, обратитесь к администратору', 'default', array(), 'bad');
				return $this->redirect("/");
			}
		}
		return $this->set(compact('id'));
	}

	public function send_email(){
		$this->view = false;
		$email = new CakeEmail('smtp');
		$data = $this->Subscriber->find('all');
		foreach($data as $item){
			$e = $item['Subscriber']['email'];
			$email->from(array('info@kazchem.kz' => 'Подписка на сайт kazchem.kz'))
				->to($e)
				->subject('Новые письмо с сайта');
				$message = 'Письмо для ' . $e;
				$email->send($message);
				sleep(5);

		}
		return $this->redirect("/");
	}

	public function admin_delete($id){
		if (!$this->Subscriber->exists($id)) {
			throw new NotFounddException('This material is not');
		}
		if($this->Subscriber->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function admin_mailing(){
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['Subscriber'];
			$subject = $data['title'];
			$message = $data['body'];
			$email = new CakeEmail('smtp');

			$email_data = $this->Subscriber->find('all');

			// debug($email_data);die;
			foreach($email_data as $item){
				if($item['Subscriber']['active'] == 1){
					$e = $item['Subscriber']['email'];
					$email->from(array('info@kazchem.kz' => 'Kazchem'))
						->to($e)
						->subject($subject);
					$message .= "<p><a href='https://kazchem.kz/subscribers/deactivate/".$item['Subscriber']['number']."'>Отписаться</a></p>";
					$email->viewVars(array('content' => $message));
					$email->template('welcome','default');
					$email->emailFormat('html');

					$email->send($message);
					sleep(5);
				}
			}


					// $e = 'd_dilya@mail.ru';
					// $email->from(array('suraya-jewelry.kz@yandex.kz' => 'Suraya Jewelry'))
					// 	->to($e)
					// 	->subject($subject);
					// $message .= "<p><a href='http://suraya-jewelry.kz/subscribers/deactivate/".$item['Subscriber']['number']."'>Отписаться</a></p>";
					// $email->viewVars(array('content' => $message));
					// $email->template('welcome','default');
					// $email->emailFormat('html');

					// $email->send($message);
					// sleep(5);
				
			return $this->redirect("/");
			
		}
	}
}