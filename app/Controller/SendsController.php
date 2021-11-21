<?php

App::uses('CakeEmail', 'Network/Email');

class SendsController extends AppController {

	public $uses = array('Send', 'Contact');
	public function beforeFilter(){
		parent::beforeFilter();
	}
	public $helpers = array('Html', 'Form', 'Session');
	public function send(){
		$this->layout = 'requests';
	
		if($this->request->is('post')){
			// debug($_POST);
			// debug($this->request->data['g-recaptcha-response']);
			// die;

			// if( empty($this->request->data['g-recaptcha-response']) ){
			// 	$this->Session->setFlash('Вы не прошли проверку', 'default', array(), 'bad');
			// 	// debug($_SESSION);die;
			// 	return $this->redirect($this->referer());
				// // exit;
			// }else{
				
				$this->Send->create();
				// debug(1234);
				// die;
				$data = $this->request->data['Send'];
				$send_email = $this->Contact->find('first', array(
					'conditions' => array('Contact.city' => $data['city'])
				));
				$send_email = $send_email['Contact']['auto_email'];
				// $send_email = '';
				$city = $data['city'];
				if(empty($send_email)) $send_email = 'nuraly.smagulov@yandex.kz';
				
				// debug($email);
				// debug($data);
				// die;
				$email = new CakeEmail('smtp');
				$email->from(array('astanacreative.kz@yandex.kz' => 'R-finance (Авто)'))
				->to($send_email)
				->subject('Новые письмо с сайта');

				$message = 'Город: ' . $data['city'] . ' ФИО: '. $data['fio'] . ' Телефон: ' . $data['phone'] . ' Марка: ' . $data['mark'] . ' Модель: ' . $data['model'] . ' Желаемая сумма: ' . $data['sum'] . ' тг.';
				// debug($data);
				// die;
				if( $this->Send->save($data) && $email->send($message) ){
				// if( $email->send($message) ){
					$this->Session->setFlash('Заявка успешно отправлена, в ближайщее время с Вами свяжется наш менеджер. Спасибо!', 'default', array(), 'good');
					// debug($data);
					// debug(12345);die;
					return $this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
					debug($message);die;
				}
			// }
			
		}
		// $list = $this->Send->find('list', array(
		// 	'conditions' => array('Send.parent_id' => 0)
		// ));
		// $this->set(compact('list'));
	}
}