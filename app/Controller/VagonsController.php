<?php

class VagonsController extends AppController{

	// public $components = array('Paginator');

	// public function beforeFilter(){
	// 	parent::beforeFilter();
	// }
	public function test(){
		$content = file_get_contents("https://www.railwagonlocation.com/xml/export.php?name=kazchemicals_XML&password=iGwwakAe&request_type=view_vagon&vagon_no=64257280");
		// // 64257280


		$p = xml_parser_create();
		xml_parse_into_struct($p, $content, $vals, $index);
		xml_parser_free($p);
		debug($vals);die;
		// $data = array();

		// foreach($vals as $item){
		// 	if($item['tag'] == 'FROM_NAME') $data['FROM_NAME'] = $item['value'];

		// 	if($item['tag'] == 'TO_NAME') $data['TO_NAME'] = $item['value'];

		// 	if($item['tag'] == 'SEND_DATE_TIME') $data['SEND_DATE_TIME'] = $item['value'];

		// 	if($item['tag'] == 'CURRENT_POSITION') $data['CURRENT_POSITION'] = $item['value'];

		// 	if($item['tag'] == 'CURRENT_POSITION_DATE') $data['CURRENT_POSITION_DATE'] = $item['value'];

		// 	if($item['tag'] == 'DISTANCE_END') $data['DISTANCE_END'] = $item['value'];

		// 	if($item['tag'] == 'STATE') $data['STATE'] = $item['value'];

		// 	if($item['tag'] == 'DAYS_END') $data['DAYS_END'] = $item['value'];
		// }
		// debug($data);
		// debug($vals);
		// die;
		$this->set(compact('title_for_layout', 'data', 'l'));
	}

	public function index(){
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		// $this->Vagon->locale = Configure::read('Config.language');
		$l = Configure::read('Config.language');
		// $this->Vagon->Category->locale = Configure::read('Config.language');
		// $this->Vagon->bindTranslation(array('title' => 'titleTranslation'));
		$user_data = $this->Auth->user();

		$conditions = array(
			'Vagon.user_id' => $user_data['id'],
			'Vagon.created >' => date('Y-m-d', strtotime("-2 month")),
		);

		if (isset($_GET['number']) && $_GET['number']) {
			$conditions = array_merge($conditions, array('Vagon.vagon' => $_GET['number']));
		}


		$number = isset($_GET['number']) ? $_GET['number'] : '';

		$paginator = array();
		$paginator['per_page'] = 2;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Vagon->find('count', array(
			'conditions' => $conditions));
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

		$data = $this->Vagon->find('all', array(
			'conditions' => $conditions,
			'order' => array('Vagon.id' => 'DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
			// 'limit' => 12,
		));
		//сортировка по кол-ву просмотров
		// if(isset($this->request->query['order']) && $this->request->query['order'] == 'views'){
		// 	uasort($data, array($this, 'sortByView'));
		// }
		// debug($data);die;
		$title_for_layout = __('Отслеживание');



		$this->set(compact('title_for_layout', 'data', 'l', 'user_data', 'paginator', 'number'));
	}

	public function archive(){
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		// $this->Vagon->locale = Configure::read('Config.language');
		$l = Configure::read('Config.language');
		// $this->Vagon->Category->locale = Configure::read('Config.language');
		// $this->Vagon->bindTranslation(array('title' => 'titleTranslation'));
		$user_data = $this->Auth->user();

		$conditions = array(
			'Vagon.user_id' => $user_data['id'],
			'Vagon.created <=' => date('Y-m-d', strtotime("-2 month")),
		);

		if (isset($_GET['number']) && $_GET['number']) {
			$conditions = array_merge($conditions, array('Vagon.vagon' => $_GET['number']));
		}


		$number = isset($_GET['number']) ? $_GET['number'] : '';

		$paginator = array();
		$paginator['per_page'] = 2;
		$paginator['current_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$paginator['offset'] = ($paginator['current_page'] * $paginator['per_page']) - $paginator['per_page'];
		$paginator['link'] = (isset($_GET['cat'])) ? '?cat='.(int)$_GET['cat'].'&page=' : '?page=';
		$paginator['count'] = $this->Vagon->find('count', array(
			'conditions' => $conditions));
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

		$data = $this->Vagon->find('all', array(
			'conditions' => $conditions,
			'order' => array('Vagon.id' => 'DESC'),
			'offset' => $paginator['offset'],
			'limit' => $paginator['per_page'],
			// 'limit' => 12,
		));
		//сортировка по кол-ву просмотров
		// if(isset($this->request->query['order']) && $this->request->query['order'] == 'views'){
		// 	uasort($data, array($this, 'sortByView'));
		// }
		// debug($data);die;
		$title_for_layout = __('Отслеживание');



		$this->set(compact('title_for_layout', 'data', 'l', 'user_data', 'paginator', 'number'));
	}

	public function admin_index(){
		$this->Vagon->locale = array('ru', 'kz', 'en');
		$this->Vagon->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Vagon->find('all', array(
			'order' => array('Vagon.id' => 'desc')
			));

		$this->set(compact('data'));
	}

	public function add(){
		if(!$this->Auth->user()){
			return $this->redirect($this->Auth->redirectUrl());
		}
		$user_data = $this->Auth->user();
		//https://www.railwagonlocation.com/xml/export.php?name=kazchemicals_XML&password=iGwwakAe&request_type=add_vagon&vagon_no=64257280&from=000000&to=000000&send_day=2020-10-23
		if($this->request->is('post')){
			$this->Vagon->create();
			$data = $this->request->data['Vagon'];
			$date = date('Y-m-d');
			$vagon = $data['vagon'];
			$content = file_get_contents("https://www.railwagonlocation.com/xml/export.php?name=kazchemicals_XML&password=iGwwakAe&request_type=add_vagon&vagon_no=$vagon&from=000000&to=000000&send_day=$date");
			$p = xml_parser_create();
			xml_parse_into_struct($p, $content, $vals, $index);
			xml_parser_free($p);

			foreach($vals as $item){
				if($item['tag'] == 'STATUS' && $item['value'] == 'FAILED'){
					$data['STATUS'] = 'FAILED';
				}
				if($item['tag'] == 'ERROR'){
					$data['ERROR'] = $item['value'];
				}

			}

			if(isset($data['ERROR'])){
				if($data['ERROR'] != 'this carriage/container is already added'){
					$this->Session->setFlash($data['ERROR'], 'default', array(), 'bad');
				}

				if($data['ERROR'] == 'this carriage/container is already added'){
					$check = $this->Vagon->find('all', array(
						'conditions' => array(
							array('Vagon.vagon' => $data['vagon']),
							array('Vagon.user_id' => $data['user_id'])
							)
					));
					if($check){
						$this->Session->setFlash('Вы уже добавляли данный вагон', 'default', array(), 'bad');
						return $this->redirect($this->referer());
					}else{
						$this->Vagon->save($data);
						return $this->redirect($this->referer());
					}

				}
			}else{ //если нету ошибок
				if($this->Vagon->save($data)){
					$this->Session->setFlash('Добавлено', 'default', array(), 'good');
					return $this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
				}
			}
			// debug($data);
			// debug($vals);die;

		}
		$title_for_layout = 'Добавление вагона на отслеживание';
		$this->set(compact('title_for_layout', 'user_data'));
	}

	public function admin_add(){

		if($this->request->is('post')){
			$this->Vagon->create();
			$data = $this->request->data['Vagon'];

			if($this->Vagon->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$title_for_layout = 'Добавление вагона на отслеживание';
		$this->set(compact('title_for_layout', 'categories'));
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Vagon->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Vagon->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Vagon->locale = 'en';
		}else{
			$this->Vagon->locale = 'ru';
		}

		$data = $this->Vagon->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Vagon->id = $id;
			$data1 = $this->request->data['Vagon'];


			$data1['id'] = $id;

			if($this->Vagon->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Vagon->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Vagon->read(null, $id);
		}
		// $this->Vagon->Category->locale = 'ru';
		// $categories = $this->Vagon->Category->find('list');
		$this->set(compact('id', 'data', 'categories'));

	}

	public function admin_delete($id){
		if (!$this->Vagon->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Vagon->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		$this->Vagon->locale = Configure::read('Config.language');

		$data = $this->Vagon->findById($id);
		if(!$data){
			throw new NotFoundException("Такой страницы нету");
		}
		$id = $data['Vagon']['id'];
		// $other_news = $this->Vagon->find('all', array(
		// 	'conditions' => array('Vagon.id !=' => $id),
		// 	'order' => array('Vagon.date' => 'DESC'),
		// 	'limit' => 5
		// ));
		// debug($other_news);die;


		$title_for_layout = '';
		//$this->Vagon->query("UPDATE `publications` SET `views` = `views` + 1 WHERE `id`='" . $id . "'");
		$this->set(compact('data','title_for_layout'));
	}

	public function search($id){

		$this->Vagon->locale = Configure::read('Config.language');

		$data = $this->Vagon->findByid($id);

		// debug($other_news);die;
		if(!$data){
			throw new NotFoundException("Такой страницы нету");
		}else{
			$link = '/' . $this->Vagon->locale . '/news/view/' . $data['Vagon']['alias'];
			// debug($link);die;
			return $this->redirect($link);
		}

	}

	public function sortByView($f1,$f2){
      if(count($f1['Vagon']['views']) < count($f2['Vagon']['views'])) return 1;
      elseif(count($f1['Vagon']['views']) > count($f2['Vagon']['views'])) return -1;
      else return 0;
   }

}
