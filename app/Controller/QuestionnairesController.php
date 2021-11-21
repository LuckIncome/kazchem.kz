<?php
App::uses('CakeEmail', 'Network/Email');
class QuestionnairesController  extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
		// $this->layout = 'index';
	 	$this->Auth->allow('cabinet');
	 }
	public function admin_index(){
		
	
		
		$paginator = array();
		$paginator['per_page'] = 50;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Questionnaire->find('count');
		$paginator['count_pages'] = ceil($paginator['count'] / $paginator['per_page']);
		$paginator['start'] = '';
		$paginator['end'] = '';
		$paginator['prev'] = '';
		$paginator['next'] = '';
		$data = $this->Questionnaire->find('all', array(
			'order' => array('Questionnaire.id DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
		));

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

		//сортировка по кол-ву комментариев
		if(isset($this->request->query['order']) && $this->request->query['order'] == 'comments'){
			uasort($news, array($this, 'sortByComment'));
		}
		//сортировка по кол-ву просмотров
		if(isset($this->request->query['order']) && $this->request->query['order'] == 'views'){
			uasort($news, array($this, 'sortByView'));
		}
		$this->set(compact('data','paginator'));
	}


	
	
	public function send(){
		$this->autoRender = false;
		if($this->request->is(array('post', 'put'))){
			$this->Questionnaire->create();
			$data = $this->request->data['Questionnaire'];
			if($this->Questionnaire->save($data)){
				$this->Session->setFlash('Спасибо ваша заявка принята! <br>', 'default', array(), 'good');
				return $this->redirect("/products");
				
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	
	public function admin_delete($id){
		
		if($this->Questionnaire->delete($id)){
			// die;
			// $data = $this->request->data;
			//
			
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	

}