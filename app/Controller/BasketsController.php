<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
class BasketsController extends AppController{
	public $components = array('Paginator');
	public $uses = array('Basket', 'Share', 'Area', 'User');
	public function beforeFilter(){
		parent::beforeFilter();
	 }
	public function admin_index(){
		$data = $this->Basket->find('all', array(
			'order' => array('Basket.id' => 'DESC')
		));
		$this->set(compact('data'));
	}

	public function index(){
		$this->Share->locale = Configure::read('Config.language');
		$shares = $this->Share->find('all', array(
			'order' => array('Share.id' => 'DESC')
		));
		$user_data = $this->Auth->user();
		$user_id = $user_data['id'];
		$user_data = $this->User->findById($user_id);
		$user_data = $user_data['User'];
		$areas = $this->Area->find('all', array(
			'order' => array('Area.priority' => 'DESC')
		));
		$this->set(compact('user_data', 'user_id', 'shares', 'areas'));
	}

	public function send(){
		
		
		if($this->request->is('post')){
			$data = $this->request->data['Basket'];
			$data['status'] = 'На модерации';
			// После заполнение area саином включить почту
			$recipient = array('sales@kazchem.kz');
			$recipient[] = 'info@kazchem.kz';
			$region = $data['reqion'];
			if($data['area'] == 1){ $recipient[] = 'akm@kazchem.kz';
				
				$recipient[] = 'kazchemamo@yandex.kz';//amo crm
			}
			if($data['area'] == 9){ 
				$recipient[] = 'kst@kazchem.kz'; 
				$recipient[] = 'kazchemkst@yandex.kz';//amo crm
			}
			if($data['area'] == 11 || $data['area'] == 4 || $data['area'] == 14 || $data['area'] == 2 || $data['area'] == 6){ 

			$recipient[] = 'zko@kazchem.kz';
			$recipient[] = 'kazchemzko@yandex.ru';//amo crm
			}
			if($data['area'] == 5){ 
				$recipient[] = 'vko@kazchem.kz'; 
				$recipient[] = 'kazchemvko@yandex.kz';
			}
			if($data['area'] == 13){ 
				$recipient[] = 'sko@kazchem.kz'; 
				$recipient[] = 'kazchemsko@yandex.kz';//amo crm
			}
			if($data['area'] == 3 || $data['area'] == 11){ 
				$recipient[] = 'kazhchemmangystau@yandex.kz'; //amo crm
			}
			if($data['area'] == 12 || $data['area'] == 8){ 
				$recipient[] = 'kazhchempavlo@yandex.kz'; //amo crm
			}
			if($data['area'] == 10){ 
				$recipient[] = 'kazhchemorda@yandex.kz'; //amo crm
			}
			$email = new CakeEmail('smtp');
			
			$email->from(array('info@kazchem.kz' => 'kazchem.kz'))->to($recipient)->subject('Новая заявка с сайта');
			$message = '<strong>Новая заявка с сайта</strong> 
			<br><strong>Список товаров:</strong>'.$data['senddata'].
			'<p> <b>Имя:</b> ' . $data['name'] . '</p> '.
			'<p><b>Контактный телефон:</b> ' . $data['phone'] . '</p>' . 
			'<p><b>Почта: </b> ' . $data['email'] . '</p>'. 
			'<p><b>Регион: </b> ' . $region . '</p>'.
			'<p><b>Адрес:</b> ' . $data['address'] . '</p>';
			
			$email->viewVars(array('content' => $message));
			$email->template('welcome','default');
			$email->emailFormat('html');
			//после настройки почты $email->send($message)
			
			if($email->send($message) && $this->Basket->save($data)){
			// if($this->Basket->save($data)){
				$this->Session->setFlash('Благодарим за заказ! <br>
Наш менеджер объязательно с вами свяжется', 'default', array(), 'good');
				return $this->redirect("/baskets");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
			
			
			
		}
	}

	public function postlink(){
		$this->layout = false;
		$this->autoRender = false ;
		if($this->request->is(array('post', 'put'))){
			App::import(
			    'Vendor',
			    'KKBsign',
			    array('file' => 'paysys' . DS . 'kkb.utils.php')
			);
			$data = $this->request->data;
			$path1 = '/var/www/vhosts/kazchem.kz/httpdocs/app/Vendor/paysys/config.txt';
			$result = 0;
			if(isset($_POST["response"])){$response = $_POST["response"];};
			$result = process_response(stripslashes($response),$path1);
			$order_id = $result['ORDER_ORDER_ID'];

			//$refound = process_refund($result['PAYMENT_REFERENCE'],'refound',$order_id,398,$result['ORDER_AMOUNT'],'Тестовый платеж',$path1);
			// $complete = process_complete($result['PAYMENT_REFERENCE'],'complete',$order_id,398,$result['ORDER_AMOUNT'],$path1);
			// $epay_url = 'https://epay.kkb.kz/jsp/remote/control.jsp?' . urlencode($complete);
			// if($curl = curl_init()){
			// 	curl_setopt($curl, CURLOPT_URL, $epay_url);
			// 	curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
			// 	$out = curl_exec($curl);
			// 	if($out){
			// 		$data2 = array('id' => $order_id, 'refound' => $out);
			// 		$this->Basket->save($data2);
			// 	}
			// 	curl_close($curl);
			// }

			$j = json_encode($result);
			$data3 = array('id' => $order_id, 'res' => $j, 'reference' => $result['PAYMENT_REFERENCE']);
			$this->Basket->save($data3);
			$url = FULL_BASE_URL . '/baskets/check_status?order_id=' . $order_id;
			if(is_array($result)){
				if(in_array("ERROR",$result)){
					if($result["ERROR_TYPE"]=="ERROR"){
						echo "System error:".$result["ERROR"];
					}elseif($result["ERROR_TYPE"]=="system"){
						echo "Bank system error > Code: '".$result["ERROR_CODE"]."' Text: '".$result["ERROR_CHARDATA"]."' Time: '".$result["ERROR_TIME"]."' Order_ID: '".$result["RESPONSE_ORDER_ID"]."'";
					}elseif($result["ERROR_TYPE"]=="auth"){
						echo "Bank system user autentication error > Code: '".$result["ERROR_CODE"]."' Text: '".$result["ERROR_CHARDATA"]."' Time: '".$result["ERROR_TIME"]."' Order_ID: '".$result["RESPONSE_ORDER_ID"]."'";
					}
				// }elseif(true){
				}elseif($curl = curl_init()){
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
					$out = curl_exec($curl);
					if($out == "OK"){
						echo 0;
					}else{
						echo "error";
					}
					curl_close($curl);
				}

			}else{
				echo "System error".$result; 
			}

			// debug($data);
			// die;
		}
		
	}

	public function check_status(){
		$this->layout = false;
		$this->autoRender = false ;
		if(isset($this->request->query['order_id']) && !empty($this->request->query['order_id'])){
			$order_id = $this->request->query['order_id'];
			$data = array('id' => $order_id, 'status' => 1);
			if($this->Basket->save($data)){
				return "OK";
			}else{
				return "error";
			}
		}else{
			return 'error';
		}
	}

	public function check_pay(){
		if(isset($this->request->query['order_id']) && !empty($this->request->query['order_id'])){
			$order_id = $this->request->query['order_id'];
			$data = $this->Basket->findById($order_id);
			if (!$this->Basket->exists($order_id)) {
				$this->Session->setFlash('Такого заказа нету', 'default', array(), 'bad');
				return $this->redirect('/');
			}
			if($data['Basket']['status'] == 1){
				$this->Session->setFlash('Заказ успешно оплачен.', 'default', array(), 'good');
				return $this->redirect('/');
			}else{
				$this->Session->setFlash('Что-то пошло не так или Вы прервали оплату', 'default', array(), 'bad');
				return $this->redirect('/');
			}
		}else{
			return 'error';
		}
	}

	public function admin_payments(){
		$this->Paginator->settings = array(
			'order' => array('Basket.id' => 'DESC'),
			// 'fields' => array('id', 'title', 'body', 'img'),
			'recursive' => -1,
			'limit' => 10,
		);
		$data = $this->Paginator->paginate('Basket');

		// $data = $this->Basket->find('all', array(
		// 	'order' => array('Basket.id' => 'DESC')
		// ));

		$this->set(compact('data'));
	}

	public function admin_view($id){
		$data = $this->Basket->findById($id);
		if($this->request->is(array('post', 'put'))){
			$this->Basket->id = $id;
			$data1 = $this->request->data['Basket'];
			
			$data1['id'] = $id;
			if(!isset($data1['kp']['name']) || !$data1['kp']['name']){
				unset($data1['kp']);
			}
			if($this->Basket->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		
		$this->set(compact('data', 'id'));
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Basket->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Basket->findById($id);
		
		if($this->request->is(array('post', 'put'))){
			$this->Basket->id = $id;
			$data1 = $this->request->data['Basket'];
			
			$data1['id'] = $id;
			if($this->Basket->save($data1)){
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
		if (!$this->Basket->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Basket->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
}