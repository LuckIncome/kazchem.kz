<?php
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController{

	public $uses = array('User', 'Basket', 'BlowfishPasswordHasher','UsersField', 'Area');

	public function beforeFilter(){
		parent::beforeFilter();
		// $this->layout = 'index';
	 	$this->Auth->allow('cabinet');
	}
	public function checkAuth(){
		$l = Configure::read('Config.language');
		if(!$this->Auth->user()){
			return $this->redirect('/' . $l . '/users/login');
		}
	}
	public function my_orders(){
		$this->checkAuth();
		$user_data = $this->Auth->user();
		$data = $this->Basket->find('all', array(
			'conditions' => array('Basket.user_id' => $user_data['id']),
			'order' => array('Basket.id' => 'DESC')
		));
		// $data = array();
		$title_for_layout = __('Мои заказы');
		$this->set(compact('data', 'title_for_layout', 'user_data'));
	}
	public function view_order($id){
		$this->checkAuth();
		if(is_null($id) || !(int)$id || !$this->Basket->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Basket->findById($id);
		// debug(json_decode($data['Basket']['json'], true));
		// die;
		// $data = array();
		$title_for_layout = __('Мои заказы');
		$this->set(compact('data', 'title_for_layout'));
	}

	public function resend_order($id){
		$this->checkAuth();
		if(is_null($id) || !(int)$id || !$this->Basket->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Basket->findById($id);
		unset($data['Basket']['id']);
		unset($data['Basket']['created']);
		unset($data['Basket']['modified']);
		$data['Basket']['status'] = 'Новый переотправленный заказ';
		if($this->Basket->save($data['Basket'])){
			$this->Session->setFlash(__('Заказ успешно переотправлен!'), 'default', array(), 'good');

		}else{
			$this->Session->setFlash(__('К сожалению произошла ошибка! Заказ не переотправлен'), 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
		// debug(json_decode($data['Basket']['json'], true));
		// die;
		// $data = array();
		$title_for_layout = __('Мои заказы');
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
	
		$data = $this->User->find('all', array(
			'conditions' => array('User.role'=>'user'),
			'order' => array('User.id' => 'DESC')
		));
		// debug($data);
		$this->set(compact('data'));
	}

	public function admin_login(){
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect('/admin');
	        }
	        $this->Session->setFlash('Неверный логин или пароль.', 'default', array(), 'bad');
	    }
	}

	public function admin_logout(){
		
		return $this->redirect($this->Auth->logout());
	}

	public function newpsw($number = null){
		if(isset($number) && !empty($number)){
			$user = $this->User->find('first', array(
				'conditions' => array('User.forgetpwd' => $number),
			
			));
			$id = $user['User']['id'];
			if($user){
				// $user = $user['User'];
				unset($user['User']['password']);
				$mail = $user['User']['email'];
				$this->Auth->login($user['User']);
			    // return $this->redirect('/' . $l . '/users/ads')
			    $this->set(compact('user', 'title_for_layout', 'id'));
			    // return $this->redirect('/users/changepsw');
			}
		}else{
			$this->Session->setFlash('Ошибка, обратитесь к администратору!', 'default', array(), 'bad');
			return $this->redirect("/users/login");
		}
	}

	public function changepsw(){
		if($this->request->is(array('post', 'put'))){
			
			$data1 = $this->request->data['User'];
			$data1['forgetpwd'] = '';
			$this->User->id = $data1['id'];
			if(empty($data1['password']) || !$data1['password']){
				unset($data1['password']);
			}
			if(empty($data1['password_repeat']) || !$data1['password_repeat']){
				unset($data1['password_repeat']);
			}
			
			if($this->User->save($data1)){
				$this->Session->setFlash('Пароль успешно изменен', 'default', array(), 'good');
				return $this->redirect('/users/profile');
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function forgetpwd($number = null){
		
		if(isset($number) && !empty($number)){
			$user = $this->User->find('first', array(
				'conditions' => array('User.forgetpwd' => $number),
			
			));
			if($user){
				$user = $user['User'];
			$mails = $user['email'];
			
			unset($user['password']);
			$rand = rand(100000, 999999);
			// debug($mails);
			// debug($user);
			// die;
			$email = new CakeEmail('smtp');
			$email->from(array('info@kazchem.kz' => 'Восстановление пароля'))
			// ->to('nurzhananuarbek@mail.ru')
			->to($mails)
			->subject('Новое письмо с сайта');
			$message = 'Ваш новый пароль: '. $rand;

			

			$user['password'] = $rand;
			
			// $data = array('password' => $rand);
			// debug($user);
			// die;
			if($this->User->save($user) && $email->send($message)){
				$this->Session->setFlash('Новый пароль отправлен Вам на почту', 'default', array(), 'good');
				// debug($data);
				return $this->redirect("/users/login");
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			// debug($user);
		}else{
			$this->Session->setFlash('Ошибка, обратитесь к администратору!', 'default', array(), 'bad');
		}
			

		}

		if($this->request->is(array('post', 'put'))){
			$username = $this->request->data['User']['email'];
			$q = $this->User->find('first', array(
				'conditions' => array('User.email' => $username)
			));
			if(empty($q)){
				$this->Session->setFlash('Данная почта не зарегистрирована', 'default', array(), 'bad');
				return $this->redirect('/users/forgetpwd');
			}else{
				// $name = 'admin';
				
				$forgetpwd = rand(100000, 999999);
				
		        $sql = "UPDATE users SET forgetpwd='" . $forgetpwd ."' WHERE email='" . $username . "'";
		        // debug($sql);die;
		        $update = $this->User->query($sql);
		        $email = new CakeEmail('smtp');
		        $email->from(array('info@kazchem.kz' => 'Восстановление пароля'))
				->to($username)
				->subject('Восстановление пароля');
				


				$message ="<p>Уважаемый Клиент!</p>
				<p>Вы отправили заявку на восстановление пароля на сайте KAZCHEM.KZ</p>
				<p>Чтобы восстановить пароль, воспользуйтесь
следующей ссылкой: <a href='https://kazchem.kz/users/newpsw/".$forgetpwd ."'>https://kazchem.kz/users/newpsw</a></p>
<p>Если вы не запрашивали изменение пароля на
сайте, просто проигнорируйте данное письмо.</p>
<p>С наилучшими пожеланиями,
компания «KAZCHEM»</p>";
				$email->viewVars(array('content' => $message));
				$email->template('welcome','default');
				$email->emailFormat('html');

				if($email->send($message)){
					$this->Session->setFlash('На указанный E-mail отправлено письмо', 'default', array(), 'good');
					// debug($data);
					return $this->redirect("/users/login");
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				}
		        // $update = $this->User->query("UPDATE users SET password='{$hash}' WHERE username='{$email}'");
		      
			}
			
			
		}
		$this->set(compact('q'));
	}

	public function login(){
		// debug($this->Auth->user());
		// $this->Auth->user();
		// die;
		if($this->Auth->user()){
			// $this->Session->setFlash('Вы успешно авторизаци', 'default', array(), 'good');
			return $this->redirect('/users/profile');
		}
		if($this->request->is('post')){
			
			if($this->Auth->login()){
				return $this->redirect('/users/profile');
			}else{
				$this->Session->setFlash('Ошибка авторизации', 'default', array(), 'bad');
				return $this->redirect('/users/login');
			}
		}
		$title_for_layout = 'Авторизация';
		$this->set(compact('title_for_layout'));
	}

	public function edit(){
		// if(is_null($id) || !(int)$id || !$this->User->exists($id)){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$id = $this->Auth->user();
		$data = $this->User->findById($id['id']);
		$id= $id['id'];
		// if(!$id){
		// 	throw new NotFoundException('Такой страницы нет...');
		// }
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			$data1['phone'] = $data1['username'];

			$check_phone = $this->User->find('first', array(
				'conditions' => array(
					array('User.username' => $data1['username']),
					array('User.id !=' => $id))
			));
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(empty($check_phone)){
				unset($data1['password']);
				unset($data1['password_repeat']);
				
				if($this->User->save($data1)){
					$this->Session->setFlash('Сохранено', 'default', array(), 'good');
					return $this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				}
			}else{
				$this->Session->setFlash(__('Данный телефон уже зарегистрирован!'), 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}

			
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = __('Редактирование профиля');
			$areas = $this->Area->find('all');
			$this->set(compact('id', 'data', 'title_for_layout', 'areas'));
		}
	}

	public function logout(){
		// $this->Session->setFlash('сработала функция logout', 'default', array(), 'good');
		// debug($this->Auth->logout());
		// die;
		return $this->redirect($this->Auth->logout());
	}

	public function registration(){
		if($this->request->is('post')){
			$this->User->create();
			$data = $this->request->data['User'];
			$data['phone'] = $data['username'];
			// debug($data);die;
			$check_phone = $this->User->find('first', array(
				'conditions' => array('User.username' => $data['phone'])
			));
			$check_email = $this->User->find('first', array(
				'conditions' => array('User.email' => $data['email'])
			));
			$mail = $data['email'];
			if(empty($check_phone) && empty($check_email)){
				$email = new CakeEmail('smtp');
				$email->from(array('info@kazchem.kz' => 'kazchem.kz'))
				->to('marketing@kazchem.kz')
				->subject('Регистрация нового пользователя на сайте kazchem.kz');
				$message = 'На сайте kazchem.kz зарегистрировался новый пользователь. Телефон: ' . $data['phone'] . ', E-mail: ' . $data['email'];
				$email->send($message);

				if($this->User->save($data)){
					// $this->Session->setFlash('Вы успешно зарегистрировались', 'default', array(), 'good');
					$this->Session->setFlash(__('Мы отправили вам письмо, необходимо активировать почту!'), 'default', array(), 'good');
					$rand = rand(100000, 999999);
					$update = $this->User->query("UPDATE users SET forgetpwd='{$rand}' WHERE email='{$mail}'");
					$email = new CakeEmail('smtp');
					$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to($mail)->subject('Регистрация на сайте');
					//Индира Шеркенова, спасибо за регистрацию на сайт «KAZCHEM»!
					//Для активации Вашей учетной записи пройдите по ссылке
					//После успешной активации для работы с нашим сайтом введите логин и пароль, указанные Вами при регистрации.
					$message = "<p>".$data['fio'].", спасибо за регистрацию на сайт «KAZCHEM»!</p><p>Для активации Вашей учетной записи пройдите по ссылке <a href='https://kazchem.kz/users/activation/".$rand."'>https://kazchem.kz/users/activation</a></p><p>После успешной активации для работы с нашим сайтом введите
логин и пароль, указанные Вами при регистрации.</p><p>После ввода вы можете пройти в личный кабинет, где вам будут
доступны следующие функции:<br>
- история ваших заказов;<br>
- система отслеживания ваших грузов;<br>
- календарь семинаров;<br>
- электронные книги и видеоматериалы
</p>
<p>Спасибо за сотрудничество!</p>
<p>С уважением,<br>
Коллектив «KAZCHEM»</p>";


					$email->viewVars(array('content' => $message));
					$email->template('welcome','default');
					$email->emailFormat('html');
					$email->send($message);
					// debug($data);
					return $this->redirect("/users/login");
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				}
			}else{
				$this->Session->setFlash(__('Данный телефон или E-mail уже зарегистрирован!'), 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}
		$areas = $this->Area->find('all');
		$title_for_layout = __('Регистрация');
		$this->set(compact('areas', 'title_for_layout'));
	}

	public function activation($number =null){
		$this->autoRender = false;
		if(isset($number) && !empty($number)){
			$user = $this->User->find('first', array(
				'conditions' => array('User.forgetpwd' => $number),
				'recursive' => -1
			));
		//	update
			if($number == $user['User']['forgetpwd']){
				$update = $this->User->query("UPDATE users SET active_email='1' WHERE forgetpwd='{$number}'");
				$this->Session->setFlash(__('Вы успешно подтвердили E-mail'), 'default', array(), 'good');
				return $this->redirect("/users/login");
			}else{
				$this->Session->setFlash(__('Ошибка'), 'default', array(), 'bad');
				return $this->redirect("/users/login");
			}

			
			// redirect
		}else{
			$this->Session->setFlash(__('Ошибка'), 'default', array(), 'bad');
			return $this->redirect("/users/login");
		}
	}

	public function send_activation_email(){
		// $this->autoRender = false;
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['User'];
			// $data = $this->Auth->user();
			// $id = $data['id'];

			$emailActivation = new CakeEmail('smtp');
			

				
			// debug($data);die;
			// $username = $data['username'];
			$mail = $data['email'];
			$check_username = $this->User->find('first', array(
				'conditions' => array('User.email' => $mail)
			));
			// debug($check_username);die;
			$rand = rand(100000, 999999);
			$update = $this->User->query("UPDATE users SET forgetpwd='{$rand}' WHERE email='{$mail}'");

			// $data['forgetpwd']= $rand;
			
			$emailActivation->from(array('info@kazchem.kz' => 'kazchem.kz'))
			->to($mail)
			->subject('Подтверждение почты');
			$messageACtivation = "<p>Для подтверждения почты перейдите по ссылке: <a href='https://kazchem.kz/users/activation/".$rand."'>https://kazchem.kz/users/activation</a></p>";
			$emailActivation->viewVars(array('content' => $messageACtivation));
			$emailActivation->template('welcome','default');
			$emailActivation->emailFormat('html');

			if( $emailActivation->send($messageACtivation)){
				$this->Session->setFlash('Письмо успешно отправлено на вашу почту', 'default', array(), 'good');
				// echo 'Письмо успешно отправлено на вашу почту, активируйте его';
				// echo "<br>";
				// echo "<a href='/users/cabinet'>Перейти на сайт</a>";
				
				// return $this->redirect('/');
			}else{
				$this->Session->setFlash('Ошибка при активации.', 'default', array(), 'bad');
				// return $this->redirect($this->referer());
			}
		}
		
		$title_for_layout = __('Активация');
		$this->set(compact('title_for_layout'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			
			$this->User->create();
			$data = $this->request->data['User'];
			if(!$data['img']['name']){
			 	unset($data['img']);
			}

			if($this->User->save($this->request->data)){
				// $this->Session->setFlash(__('Статья удачно добавлена'));
				$this->Session->setFlash('Ползователь удачно добавлен.', 'default', array(), 'good');
				$this->redirect('/admin/users');
			}else{
				// $this->Session->setFlash(__('Ошибка при добавлении пользователя'));
				$this->Session->setFlash('Ошибка регистрации.', 'default', array(), 'bad');
				$this->redirect('/admin/users/add');
			}
		}
		$title_for_layout = 'Добавление пользователя';
		$category_list = $this->User->Category->find('list');
		$city_list = $this->User->City->find('list');
		$users = $this->User->find('list');
		$this->set(compact('title_for_layout', 'users', 'category_list', 'city_list'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->User->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->User->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			unset($data1['password']);
			unset($data1['password_repeat']);
			
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->User->save($data1)){
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
	public function admin_pswedit($id){
		if(is_null($id) || !(int)$id || !$this->User->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->User->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			if(empty($data1['password']) || !$data1['password']){
				unset($data1['password']);
			}
			if(empty($data1['password_repeat']) || !$data1['password_repeat']){
				unset($data1['password_repeat']);
			}
			
			
			if($this->User->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование пароля';
			// $category_list = $this->User->Category->find('list');
			// $city_list = $this->User->City->find('list');
			// debug($category_list);
			$this->set(compact('id', 'data', 'title_for_layout'));
		}
	}
	

	public function cabinet(){
		// $this->Session->destroy('Auth');
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		$data = $this->Auth->user();
		// debug($data);
		// die;
		$id = $data['id'];
		$data = $this->User->find('first', array(
			'conditions' => array('User.id' => $id),
		'recursive' => -1));
	
		$title_for_layout = 'Личный кабинет';
		$this->set(compact('id', 'data', 'title_for_layout', 'ads'));
	}

	public function profile(){
		// $this->Session->destroy('Auth');
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		$data = $this->Auth->user();
		// debug($data);
		// die;
		$id = $data['id'];
		$data = $this->User->find('first', array(
			'conditions' => array('User.id' => $id),
			// 'recursive' => -1
		));
		//Заполняем данные в форме
		$user_id = $id;
		if($this->request->is(array('post', 'put'))){
			$this->User->id = $id;
			$data1 = $this->request->data['User'];
			
			
			if($this->User->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование';
			// $category_list = $this->User->Category->find('list');
			// $city_list = $this->User->City->find('list');
			// debug($category_list);
			$this->set(compact('id', 'data', 'category_list', 'city_list', 'title_for_layout'));
		}
	
		$title_for_layout = 'Личный кабинет';
		$this->set(compact('id', 'data', 'title_for_layout','user_id'));
	}

	public function admin_anketa(){
		$selectVar = "SELECT user_id FROM `users_fields` ";
		$select = $this->User->query($selectVar);

		foreach($select as $item){
				$user_id[] = $item['users_fields']['user_id'];
		}
		$user_id = array_unique($user_id);
		
		
		$order = array('User.created DESC');
		$paginator = array();
		$paginator['per_page'] = 10;
		$paginator['first_page'] = 1;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->User->find('count', array(
			'conditions' => array(array('User.role'=>'user'),array('User.id'=>$user_id)),
		));
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
		$data = $this->User->find('all', array(
			'order' => array('User.created' => 'desc'),
			'offset' => $paginator['offset'],
			'conditions' => array(array('User.role'=>'user'),array('User.id'=>$user_id)),
			'limit' => $paginator['per_page'],
		));
		$this->set(compact('data','paginator'));
	}
	public function pswedit(){
		// $this->Session->destroy('Auth');
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}
		$data = $this->Auth->user();
		// debug($data);
		// die;
		$id = $data['id'];
		$data = $this->User->find('first', array(
			'conditions' => array('User.id' => $id),
		'recursive' => -1));
		$passwordHasher = new BlowfishPasswordHasher();
		// debug($data);
		// debug($passwordHasher->check('123123', $data['User']['password']));
		// die;
		
		if($this->request->is(array('post', 'put'))){
			// debug($this->request->data);
			// die;
			//Проверка пароля на правильность
			// var_dump($passwordHasher->check($this->request->data['User']['current_password'], $data['User']['password']));die;
			if($passwordHasher->check($this->request->data['User']['current_password'], $data['User']['password'])){
				if(!empty($this->request->data['User']['password']) && !empty($this->request->data['User']['password_retype']) && $this->request->data['User']['password'] === $this->request->data['User']['password_retype']){
					if ($this->User->save($this->request->data)) {
						$this->Session->setFlash('Ваш пароль успешно изменен!', 'default', array(), 'good');
						return $this->redirect($this->Auth->redirectUrl());
					} else {
						$this->Session->setFlash('Ошибка. Ваш пароль не изменен.', 'default', array(), 'bad');
					}
				} else {
					$this->Session->setFlash('Введите новый пароль и повтор пароля правильно.', 'default', array(), 'bad');
				}
			}else{
				$this->Session->setFlash('Текущий пароль не верный!', 'default', array(), 'bad');
			}
			
		}
			$title_for_layout = 'Редактирование';

		
	
		// $title_for_layout = 'Личный кабинет';
		$this->set(compact('id', 'data', 'title_for_layout'));
	}

	public function admin_delete($id){
		if (!$this->User->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->User->delete($id)){
			$this->Session->setFlash('Пользователь удален', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
	public function anketa() {
		// $this->autoRender = false;
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data['UserFields'];
			$user = $this->Auth->user();
			$user_id = $user['id'];
			
			foreach($data as $key => $v){

			         $selectVar = "SELECT * FROM `users_fields`  WHERE `user_id` = $user_id AND `name`  LIKE '". $key ."'";
					//debug($selectVar);
					$select = $this->User->query($selectVar);
					
					if($select){
						// $this->User->query("UPDATE  users_fields SET `name`  = '". $key ."' , `value` = '". $v . "' WHERE `users_fields`.`user_id` = $user_id  ");
						$eee = "UPDATE  `users_fields` SET `value` = '". $v . "' WHERE `users_fields`.`user_id` = $user_id AND `users_fields`.`name` = '". $key ."' ";
						$this->User->query($eee);
						
						
					}else {
						$eee = "INSERT INTO users_fields (user_id,name,value) VALUES($user_id,'". $key ."','". $v ."')";
						$this->User->query($eee);
					}
				
			}
			if($eee){
				$this->Session->setFlash('Операция выполнена успешно!', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else {
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}

		$data = $this->Auth->user();
		// debug($data);
		// die;
		$id = $data['id'];
		$data = $this->User->find('first', array(
			'conditions' => array('User.id' => $id),
			// 'recursive' => -1
		));
		//Заполняем данные в форме
		$user_id = $id;

		$title_for_layout = __('Анкета');
		$this->set(compact('title_for_layout', 'user_id', 'data'));
	}

	// public function anketa() {
	// 	$this->autoRender = false;
	// 	if($this->request->is(array('post', 'put'))){
	// 		$data = $this->request->data['UserFields'];
	// 		$user = $this->Auth->user();
	// 		$user_id = $user['id'];
			
	// 		foreach($data as $key => $v){

	// 		         $selectVar = "SELECT * FROM `users_fields`  WHERE `user_id` = $user_id AND `name`  LIKE '". $key ."'";
	// 				//debug($selectVar);
	// 				$select = $this->User->query($selectVar);
					
	// 				if($select){
	// 					// $this->User->query("UPDATE  users_fields SET `name`  = '". $key ."' , `value` = '". $v . "' WHERE `users_fields`.`user_id` = $user_id  ");
	// 					$eee = "UPDATE  `users_fields` SET `value` = '". $v . "' WHERE `users_fields`.`user_id` = $user_id AND `users_fields`.`name` = '". $key ."' ";
	// 					$this->User->query($eee);
						
						
	// 				}else {
	// 					$eee = "INSERT INTO users_fields (user_id,name,value) VALUES($user_id,'". $key ."','". $v ."')";
	// 					$this->User->query($eee);
	// 				}
				
	// 		}
	// 		if($eee){
	// 			$this->Session->setFlash('Операция выполнена успешно!', 'default', array(), 'good');
	// 			return $this->redirect($this->referer());
	// 		}else {
	// 			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
	// 			return $this->redirect($this->referer());
	// 		}
	// 	};
	// 	$title_for_layout = __('Регистрация');
	// 	$this->set(compact('title_for_layout'));
	// }

}