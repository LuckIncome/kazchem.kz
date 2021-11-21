<?php

class CategoriesController extends AppController{
	public $uses = array('Category');
	public $components = array('Paginator');

	public function admin_index(){
		
		$data = $this->Category->find('all');
		$this->set(compact('data'));
	}

	public function index(){
			$cat_t = $this->Category->find('threaded');
		
			 $title_for_layout = "Инструкции";
			// $meta['keywords'] = $user['User']['keywords'];
			// $meta['description'] = $user['Category']['description'];
			return $this->set(compact('products', 'accessories', 'user', 'title_for_layout', 'meta', 'cat_t'));
		
	}
	
	public function CreateTree( $array,$sub=0, $tab='' )
	    {
	        $category=array();
	        if( $sub > 0 )
	        {
	            $tab .= '-';
	        }
	        foreach( $array as $v )
	        {	
	        	
	            if( $sub == $v['Category']['parent_id'])
	            {
	                $category[$v['Category']['id']]['id'] = $v['Category']['id'];
	                $category[$v['Category']['id']]['parent_id'] = $v['Category']['parent_id'];
	                $category[$v['Category']['id']]['title'] =$v['Category']['title'];
	                 $category[$v['Category']['id']]['alias'] = $v['Category']['alias'];
	                $category += $this->CreateTree($array, $v['Category']['id'], $tab);
	            }
	        }
	        return $category;
	    }
	    
	public function get_key($arr, $id)
	{
		


	    foreach ($arr as $key => $val) {
	        if ($val['id'] === $id) {
	            return $key;
	        }
	    }
	    return null;
	}

	public function getParentsById($arr, $id, $response=[])
	{	


	    $key = $this->get_key($arr, $id);
	    $response[$key]['title'] = $arr[$key]['title'];
	    $response[$key]['alias'] = $arr[$key]['alias'];
	    if ($arr[$key]['parent_id'] != 0)
	    {
	        $response = $this->getParentsById($arr, $arr[$key]['parent_id'], $response);
	    }
	    return $response;
	}
	public function view($alias){
		$data = $this->Category->findByAlias($alias);
		$cat_t = $this->Category->find('threaded');
		if (!$data) {
			throw new NotFoundException('Такой категории не существует');
		}
		/*Бредкурмбс поиск родителей */
			$cats = $this->Category->find('all');
			$navTree = $this->CreateTree($cats);
			$id =$data['Category']['id'];
			$parentList = $this->getParentsById($navTree, $id);
			$reversed = array_reverse($parentList);
		/*Бредкурмбс поиск родителей конец*/
	
		$title_for_layout = $data['Category']['title'];
		return $this->set(compact('data', 'ads', 'title_for_layout','designers','reversed', 'cat_t','childs','products','parent_id'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			
			$this->Category->create();
			$data = $this->request->data['Category'];

			$slug = Inflector::slug(mb_strtolower($data['title']), '-');
			$data[] = $this->request->data['Category'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);

			$check_alias = $this->Category->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");
			// debug($data);die;
			if(!isset($data['img']['name']) || empty($data['img']['name'])){
				unset($data['img']);
			}
			
			if($this->Category->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$cats = $this->Category->find('all');
		return $this->set(compact('cats'));

	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Category->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Category->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Category->id = $id;
			$data1 = $this->request->data['Category'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			
			if($this->Category->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$cats = $this->Category->find('all');
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$this->set(compact('id', 'data','cats'));
		}
	}

	public function admin_delete($id){
		if (!$this->Category->exists($id)) {
			throw new NotFoundException('Такой категории нету');
		}
		if($this->Category->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}