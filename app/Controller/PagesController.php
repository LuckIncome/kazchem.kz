<?php
App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {

	//public $uses = array('Page','Review','Categories','Slide','Partner','News','Mainpage','Callback','Mainpageslide','Servicecallback','Faq','Doc','Team');
	public $uses = array('Page','Slide','Partner','News','Faq','Doc','Team');
	// public $uses = array('Page', 'Slide','Partner','News');

	public function admin_welcome(){
		
	}
	public function agrocalc(){
		$title_for_layout = __('Агрокалькулятор');
		$this->set(compact('title_for_layout'));
	}

	public function about(){
		$this->Team->locale = Configure::read('Config.language');
		$teams = $this->Team->find('all', array(
			'order' => array('Team.priority' => 'desc')
		));
		$title_for_layout = __('О компании');
		$meta['keywords'] = 'о компании Kazchem, удобрения, водорастворимые удобрения, микроудобрения, средства защиты растений, семена, минеральные удобрения, сзр';
		$meta['description'] = "«KAZCHEM» – это международная торгово-производственная компания, созданная для обеспечения фермеров Казахстана высококачественными минеральными удобрениями.";
		$this->set(compact('title_for_layout', 'meta', 'teams'));
	}

	public function how_to_buy(){
		$title_for_layout = __('Как купить');
		$this->set(compact('title_for_layout'));
	}

	public function list_diagnostic(){
		$title_for_layout = __('Листовая диагностика');
		$this->set(compact('title_for_layout'));
	}

	public function admin_index(){
		$this->Page->locale = array('en', 'kz');
		$this->Page->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Page->find('all');

		$title_for_layout = 'Pages';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function index($page_alias = null){
		$this->Page->locale = Configure::read('Config.language');
		$this->Faq->locale = Configure::read('Config.language');
		$this->Doc->locale = Configure::read('Config.language');
		$this->Team->locale = Configure::read('Config.language');
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$faqs = $this->Faq->find('all', array(
			'order' => array('Faq.id' => 'desc')
		));
		$slides = $this->Slide->find('all', array(
			'order' => array('Slide.id' => 'desc')
		));
		$docs = $this->Doc->find('all', array(
			'order' => array('Doc.id' => 'desc')
		));
		$teams = $this->Team->find('all', array(
			'order' => array('Team.id' => 'desc')
		));
		$page = $this->Page->findByAlias($page_alias);
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}
		
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		$this->set(compact('page_alias', 'page', 'title_for_layout', 'meta','faqs','docs','slides','teams'));
	}

	public function admin_callbacks_delete($id){
		if (!$this->Callback->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Callback->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
	
	public function admin_callbacks(){
		$data =$this->Page->query("SELECT * FROM `callbacks` ");
		
		$this->set(compact('data'));
	}
	public function admin_servicecallbacks(){
		$data =$this->Page->query("SELECT * FROM `servicecallbacks` ");
		
		$this->set(compact('data'));
	}

	public function admin_delete($id){
		if (!$this->Page->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Page->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
	public function admin_servicecallbacks_delete($id){
		if (!$this->Servicecallback->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Servicecallback->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
	public function admin_quetions_delete($id){
		if (!$this->Quetion->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Quetion->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
	public function admin_quetions(){
		$data =$this->Page->query("SELECT * FROM `quetions` ");
		
		$this->set(compact('data'));
	}
	public function home(){
			
		// $this->News->locale = Configure::read('Config.language');
		$this->Slide->locale = Configure::read('Config.language');
		
		// $news = $this->News->find('all', array(
		// 	'order' => array('News.date' => 'desc'),
		// 	'limit' =>4
		// ));
		$slides = $this->Slide->find('all');
		
		$title_for_layout ='Минеральные удобрения в Казахстане';
		$meta['keywords'] = 'удобрения, водорастворимые удобрения, микроудобрения, средства защиты растений, семена, минеральные удобрения, сзр';
		$meta['description'] = "Минеральные удобрения в Казахстане. Производство удобрений. Поставка импортных удобрений. Агроконсалтинг. Субсидирование";
		
		$this->set(compact('title_for_layout', 'meta' ,'news', 'slides'));
	}
	public function partnersprogram(){
		
		$title_for_layout = 'Партнерская программа';
	
		// $meta['keywords'] = $page['Page']['keywords'];
		// $meta['description'] = $page['Page']['description'];
		$this->set(compact('title_for_layout', 'meta','slides','new','featured','partners','data'));
	}
	public function contacts(){
		
		$title_for_layout = 'Контакты';
		$slides = $this->Slide->find('all');
		$partners = $this->Partner->find('all');
		
		$data = $this->Setting->findById(1);
		// $meta['keywords'] = $page['Page']['keywords'];
		// $meta['description'] = $page['Page']['description'];
		$this->set(compact('title_for_layout', 'meta','slides','new','featured','partners','data'));
	}
	public function contactsend(){
		
		
		if($this->request->is('post')){
			$data = $this->request->data['Contact'];
			// После заполнение area саином включить почту
		
			$email = new CakeEmail('smtp');
			$mail = array('office@kazchem.kz', 'assistant@kazchem.kz');
			// 'office@kazchem.kz'
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to($mail)->subject('Новое письмо с сайта ');
			$message = '<p><b>Имя:</b> ' . $data['name'] .  '</p><p><b>Контактный телефон:</b> ' . $data['phone'] . '<p><b>Почта:</b> ' . $data['email'] . '</p>' . '<p><b>Сообщение:</b> ' . $data['message'] . '</p>';
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			//после настройки почты $email->send($message)
			
			if($email->send($message)){
				$this->Session->setFlash('Спасибо ваша заявка принята! <br>', 'default', array(), 'good');
				return $this->redirect("/");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			
			
			
		}
	}
	
	public function admin_add(){

		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Page->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Page->locale = 'en';
		}else{
			$this->Page->locale = 'ru';
		}

		if($this->request->is('post')){
			$this->Page->create();
			//Создаем alias

			$slug = Inflector::slug(mb_strtolower($this->request->data['Page']['title']), '-');
			$data[] = $this->request->data['Page'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			
			if(!$data['img']['name']){
			 	unset($data['img']);
			}
			//Проверка на уникальность alias	
			$check_alias = $this->Page->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");

			if($this->Page->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Page->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Page->locale = 'en';
		}else{
			$this->Page->locale = 'ru';
		}

		if(is_null($id) || !(int)$id || !$this->Page->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Page->findById($id);
		if(!$id){
			throw new NotFoundException('Not found...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Page->id = $id;
			$data1 = $this->request->data['Page'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Page->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Editing material';
			$this->set(compact('id', 'data', 'title_for_layout'));
		}
	}

	public function contactus(){

		if( !empty($this->request->data) ){
			$email = new CakeEmail('smtp');
			$email->from(array('info@uxui.kz' => 'Usability Lab'))
			->to('info@uxui.kz')
			->subject('New letter');
			$message = 'Name: '. $this->request->data['Page']['name'] . ' Телефон: '. $this->request->data['Page']['phone'];
			if( $email->send($message) ){
				$this->Session->setFlash('Письмо успешно отправлено', 'default', array(), 'good');
				//unset($message);
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка!', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}
	}
	public function callback(){
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data;
				// debug(1234);
				// die;
			// $email = new CakeEmail('smtp');
			// $email->from(array('st-kotel.kz@yandex.ru' => 'realklimat.kz'))
			// // ->to('nurzhananuarbek@mail.ru')
			// ->to('nurzhananuarbek@mail.ru')
			// ->subject('realklimat.kz');
			
			// $message = "<p>Заявка</p>";
			// if(isset($_POST['name']) && !empty($_POST['name'])){
			// 	$message .= "<p>ФИО: " . $_POST['name'] . "</p>";
			// }
			// if(isset($_POST['phone']) && !empty($_POST['phone'])){
			// 	$message .= "<p>Телефон: " . $_POST['phone'] . "</p>";
			// }
			// if(isset($_POST['email']) && !empty($_POST['email'])){
			// 	$message .= "<p>Почта: " . $_POST['email'] . "</p>";
			// }
		
			// if(isset($_POST['body']) && !empty($_POST['body'])){
			// 	$message .= "<p>Текст: " . $_POST['body'] . "</p>";
			// }
		
			// // debug($message);die;
			// $email->viewVars(array('content' => $message));
			// $email->template('welcome','default');
			// $email->emailFormat('html');
			$query = "INSERT INTO callbacks (name, phone,email,body) VALUES('".$data['name']."','".$data['phone']."','".$data['email']."','".$data['body']."')";
			$this->Callback->query($query);
			$this->bitrix($data['name'], $data['phone'],$data['email'],$data['body']);
			$this->Session->setFlash('Спасибо за заявку', 'default', array(), 'good');
					return $this->redirect("/");
			// if($email->send($message) ){
			// 		$this->Session->setFlash('Спасибо за заявку', 'default', array(), 'good');
			// 		// $_SESSION['Message']['test'] = '123';
			// 		return $this->redirect("/?status=1");
			// }else{
			// 	$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				
			// }
		}
	}

	public function bitrix($name, $phone,$email,$body){
		$defaults = array(
		    'name' => '',
		    'last_name' => 'Клиент',
		    'phone' => '',
		    'email' => ''
		);

		    $queryUrl  = 'https://astanadevelopment.bitrix24.kz/rest/84/hm7ahs809qdktf2n/crm.lead.add.json';
		    $queryData = http_build_query(array(
		        'fields' => array(
		            "TITLE" => 'Заявка с сайта' ,
		            "NAME" => $name,
		            "LAST_NAME" => $defaults['last_name'],
		            "STATUS_ID" => "NEW",
		            "OPENED" => "Y",
		            "ASSIGNED_BY_ID" => 1,
		            "PHONE" => array(
		                array(
		                    "VALUE" => $phone,
		                    "VALUE_TYPE" => "WORK"
		                )
		            ),
		            "EMAIL" => array(
		                array(
		                    "VALUE" => $email,
		                    "VALUE_TYPE" => "WORK"
		                )
		            ),
		            "COMMENTS" =>$body,
		        ),
		        'params' => array(
		            "REGISTER_SONET_EVENT" => "Y"
		        )
		    ));
		    $curl  = curl_init();
		    curl_setopt_array($curl, array(
		        CURLOPT_SSL_VERIFYPEER => 0,
		        CURLOPT_POST => 1,
		        CURLOPT_HEADER => 0,
		        CURLOPT_RETURNTRANSFER => 1,
		        CURLOPT_URL => $queryUrl,
		        CURLOPT_POSTFIELDS => $queryData
		    ));
		    
		    $result = curl_exec($curl);
		    
		    curl_close($curl);
		    $result = json_decode($result, 1);
		    if (array_key_exists('error', $result))
		        echo "Ошибка при сохранении лида: " . $result['error_description'] . "";
	}
	public function bitrixservice($name, $phone,$email,$servicetype,$price){
		$defaults = array(
		    'name' => '',
		    'last_name' => 'Клиент',
		    'phone' => '',
		    'email' => ''
		);

		    $queryUrl  = 'https://astanadevelopment.bitrix24.kz/rest/84/hm7ahs809qdktf2n/crm.lead.add.json';
		    $queryData = http_build_query(array(
		        'fields' => array(
		            "TITLE" => 'Оформление с сайта' ,
		            "NAME" => $name,
		            "LAST_NAME" => $defaults['last_name'],
		            "STATUS_ID" => "NEW",
		            "OPENED" => "Y",
		            "ASSIGNED_BY_ID" => 1,
		            "PHONE" => array(
		                array(
		                    "VALUE" => $phone,
		                    "VALUE_TYPE" => "WORK"
		                )
		            ),
		            "EMAIL" => array(
		                array(
		                    "VALUE" => $email,
		                    "VALUE_TYPE" => "WORK"
		                )
		            ),
		            "COMMENTS" =>$servicetype,
		            "OPPORTUNITY" =>$price,
		        ),
		        'params' => array(
		            "REGISTER_SONET_EVENT" => "Y"
		        )
		    ));
		    $curl  = curl_init();
		    curl_setopt_array($curl, array(
		        CURLOPT_SSL_VERIFYPEER => 0,
		        CURLOPT_POST => 1,
		        CURLOPT_HEADER => 0,
		        CURLOPT_RETURNTRANSFER => 1,
		        CURLOPT_URL => $queryUrl,
		        CURLOPT_POSTFIELDS => $queryData
		    ));
		    
		    $result = curl_exec($curl);
		    
		    curl_close($curl);
		    $result = json_decode($result, 1);
		    if (array_key_exists('error', $result))
		        echo "Ошибка при сохранении лида: " . $result['error_description'] . "";
	}
	public function callbackservice(){
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data;
				// debug(1234);
				// die;
			// $email = new CakeEmail('smtp');
			// $email->from(array('st-kotel.kz@yandex.ru' => 'realklimat.kz'))
			// // ->to('nurzhananuarbek@mail.ru')
			// ->to('nurzhananuarbek@mail.ru')
			// ->subject('realklimat.kz');
			
			// $message = "<p>Заявка</p>";
			// if(isset($_POST['name']) && !empty($_POST['name'])){
			// 	$message .= "<p>ФИО: " . $_POST['name'] . "</p>";
			// }
			// if(isset($_POST['phone']) && !empty($_POST['phone'])){
			// 	$message .= "<p>Телефон: " . $_POST['phone'] . "</p>";
			// }
			// if(isset($_POST['email']) && !empty($_POST['email'])){
			// 	$message .= "<p>Почта: " . $_POST['email'] . "</p>";
			// }
		
			// if(isset($_POST['body']) && !empty($_POST['body'])){
			// 	$message .= "<p>Текст: " . $_POST['body'] . "</p>";
			// }
		
			// // debug($message);die;
			// $email->viewVars(array('content' => $message));
			// $email->template('welcome','default');
			// $email->emailFormat('html');
			$query = "INSERT INTO servicecallbacks (name, phone,email,type_service) VALUES('".$data['name']."','".$data['phone']."','".$data['email']."','".$data['type_service']."')";
			$this->Callback->query($query);
			$this->bitrixservice($data['name'], $data['phone'],$data['email'],$data['type_service'],$data['price']);
			$this->Session->setFlash('Спасибо за заявку', 'default', array(), 'good');
					return $this->redirect("/");
			// if($email->send($message) ){
			// 		$this->Session->setFlash('Спасибо за заявку', 'default', array(), 'good');
			// 		// $_SESSION['Message']['test'] = '123';
			// 		return $this->redirect("/?status=1");
			// }else{
			// 	$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				
			// }
		}
	}
	public function quetion(){
		if($this->request->is(array('post', 'put'))){
			$data = $this->request->data;
				// debug(1234);
				// die;
			// $email = new CakeEmail('smtp');
			// $email->from(array('st-kotel.kz@yandex.ru' => 'realklimat.kz'))
			// // ->to('nurzhananuarbek@mail.ru')
			// ->to('nurzhananuarbek@mail.ru')
			// ->subject('realklimat.kz');
			
			// $message = "<p>Заявка</p>";
			// if(isset($_POST['name']) && !empty($_POST['name'])){
			// 	$message .= "<p>ФИО: " . $_POST['name'] . "</p>";
			// }
			// if(isset($_POST['phone']) && !empty($_POST['phone'])){
			// 	$message .= "<p>Телефон: " . $_POST['phone'] . "</p>";
			// }
			// if(isset($_POST['email']) && !empty($_POST['email'])){
			// 	$message .= "<p>Почта: " . $_POST['email'] . "</p>";
			// }
		
			// if(isset($_POST['body']) && !empty($_POST['body'])){
			// 	$message .= "<p>Текст: " . $_POST['body'] . "</p>";
			// }
		
			// // debug($message);die;
			// $email->viewVars(array('content' => $message));
			// $email->template('welcome','default');
			// $email->emailFormat('html');
			$query = "INSERT INTO quetions (name, phone,email,body) VALUES('".$data['name']."','".$data['phone']."','".$data['email']."','".$data['body']."')";
			$this->Callback->query($query);

			$this->Session->setFlash('Спасибо за заявку', 'default', array(), 'good');
					return $this->redirect("/");
			// if($email->send($message) ){
			// 		$this->Session->setFlash('Спасибо за заявку', 'default', array(), 'good');
			// 		// $_SESSION['Message']['test'] = '123';
			// 		return $this->redirect("/?status=1");
			// }else{
			// 	$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				
			// }
		}
	}
}
