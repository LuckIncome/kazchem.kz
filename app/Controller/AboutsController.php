<?php

class AboutsController extends AppController{
	public $uses = array('About','Partner','Team','News');
	public function admin_index(){
		$this->About->locale = array('en', 'kz');
		$this->About->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->About->find('all');
		$title_for_layout = 'О нас';
		$this->set(compact('data', 'title_for_layout'));
	}
	public function index(){
		$this->About->locale = Configure::read('Config.language');
		$data = $this->About->findById(9);
	
		$partners = $this->Partner->find('all', array(
			'order' => array('Partner.id' => 'desc')
		));
		$about = $data['About'];
		
		$title_for_layout = $data['About']['seo_title'];
		$meta['keywords'] = $data['About']['seo_keywords'];
		$meta['description'] = $data['About']['seo_description'];
		$this->set(compact('about', 'title_for_layout','partners','teams','firstNews','othernews','meta'));
	}
	public function admin_add(){
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->About->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->About->locale = 'en';
		}else{
			$this->About->locale = 'ru';
		}
		if($this->request->is('post')){
			$this->About->create();
			$data = $this->request->data['About'];
			
			$files_array = array('img' => $data['img'],'block_img'=>$data['block_img']);
			foreach($files_array as $key => $v){
				unset($data[$key]);
			}
			foreach ($files_array as $key => $value) {
				$img_name = $this->uploadFile($value);
				if($img_name) {
					$this->About->saveField($key, $img_name);
				}
			}
			if($this->About->save($data)){
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
			$this->About->locale = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->About->locale = 'en';
		}else{
			$this->About->locale = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->About->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->About->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->About->id = $id;
			$data1 = $this->request->data['About'];
			$files_array = array('img' => $data1['img'],'block_img'=>$data1['block_img']);
			foreach($files_array as $key => $v){
				unset($data1[$key]);
			}
			foreach ($files_array as $key => $value) {
				$img_name = $this->uploadFile($value);
				if($img_name) {
					$this->About->saveField($key, $img_name);
				}
			}
			if($this->About->save($data1)){
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
	public function uploadFile($file = array()){
		// debug($file);die;
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/abouts/' . $fileName;
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}
		// debug($fileName);die;
		return $fileName;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/abouts/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}
	// public function admin_add(){
	// 	if($this->request->is('post')){
	// 		$this->About->create();
	// 		$data = $this->request->data['About'];
	// 		/*ws begin*/
	// 		if($data["imgsource"]){
	// 			$getmime = getimagesize(WWW_ROOT . trim($data["imgsource"], '/'));
	// 			$r = explode("/",  $data["imgsource"]);
	// 			$file= end($r);

	// 			$data["img"]= array(
	// 				"name"=> $file,
	// 				"tmp_name" => WWW_ROOT . trim($data["imgsource"], '/'),
	// 				"error"=> 0,
	// 				"mime"=>$getmime['mime'],
	// 				"size"=>filesize (WWW_ROOT . trim($data["imgsource"], '/'))
	// 			);
	// 			if(empty($data['img']['name']) || !$data['img']['name']){
	// 				unset($data['img']);
	// 			}

	// 			if($this->About->save($data)){
	// 				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
	// 				// debug($data);
	// 				return $this->redirect($this->referer());
	// 			}else{
	// 				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
	// 			}
	// 			}else{
	// 				$this->Session->setFlash('Ошибка! Выберите файл и обрежте его (зеленая кнопка)', 'default', array(), 'bad');
	// 			}
	// 			/*ws end*/
	// 		}
		
	// 	$title_for_layout = 'Добавление нового материала';
	// 	$this->set(compact('title_for_layout'));
	// }

	// public function admin_edit($id){
	// 	if(is_null($id) || !(int)$id || !$this->About->exists($id)){
	// 		throw new NotFoundException('Not found...');
	// 	}
	// 	$data = $this->About->findById($id);
	
	// 	if(!$id){
	// 		throw new NotFoundException('Not found...');
	// 	}
	// 	if($this->request->is(array('post', 'put'))){
	// 		$this->About->id = $id;
	// 		$data1 = $this->request->data['About'];
	// 		/*ws begin*/
	// 		if(isset($data1['imgsource']) && !empty($data1['imgsource'])){
	// 			$getmime = getimagesize(WWW_ROOT . trim($data1["imgsource"], '/'));
	// 			// $file= end(explode("/",  $data1["imgsource"]));
	// 			$r = explode("/",  $data1["imgsource"]);
	// 			$file= end($r);
	// 			$data1["img"]= array(
	// 				"name"=> $file,
	// 				"tmp_name" => WWW_ROOT . trim($data1["imgsource"], '/'),
	// 				"error"=> 0,
	// 				"mime"=>$getmime['mime'],
	// 				"size"=>filesize (WWW_ROOT . trim($data1["imgsource"], '/'))
	// 			);
	// 		}
	// 		/*ws end*/
	// 		if(!isset($data1['img']['name']) || !$data1['img']['name']){
	// 			unset($data1['img']);
	// 		}
	// 		if($this->About->save($data1)){
	// 			$this->Session->setFlash('Сохранено', 'default', array(), 'good');
	// 			return $this->redirect($this->referer());
	// 		}else{
	// 			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
	// 		}
	// 	}
	// 	//Заполняем данные в форме
	// 	if(!$this->request->data){
	// 		$this->request->data = $data;
	// 		$title_for_layout = 'Редактирование материала';
	// 		$this->set(compact('id', 'data', 'title_for_layout'));
	// 	}
	// }

	public function admin_delete($id){
		if (!$this->About->exists($id)) {
			throw new NotFounddException('This material is not');
		}
		if($this->About->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}
}