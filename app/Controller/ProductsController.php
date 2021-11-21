<?php

class ProductsController extends AppController{
	public $components = array('Paginator');	
	public $uses = array('Product','Manufacturer','Advantage','Shape','Period','Crop', 'Type', 'Photo', 'Employment', 'Composition', 'Share');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index2(){

		// $body = (!empty($this->request->query['q'])) ? array('Product.body LIKE' => "%" . $this->request->query['q'] . "%")  : "";

		$sort = (!empty($this->request->query['sort'])) ? array('Product.sort' => $this->request->query['sort'])  : "";
		// $discount = (!empty($this->request->query['discount'])) ? array('Product.discount >' => 0)  : "";
		
		// $in_stock = (!empty($this->request->query['in_stock'])) ? array('Product.in_stock' => $this->request->query['in_stock'])  : "";
		// if(!empty($this->request->query['price_from'])){
		// 	$price_from = array('Product.price >=' => $this->request->query['price_from']);
		// }else{
		// 	$price_from = "";
		// }

		// if(!empty($this->request->query['price_to'])){
		// 	$price_to = array('Product.price <=' => $this->request->query['price_to']);
		// }else{	$price_to = "";	}

		// if(isset($_GET['q'])){
		// 	$name = array('Product.title LIKE' => '%' . $_GET['q'] . '%');
		// }else{	$name = "";	}

		

		// if(isset($this->request->query['color_id']) && !empty($this->request->query['color_id'])){
		// 	//$size = array('Product.size LIKE' => '%' . $this->request->query['size'] . '%');
		// 	foreach($this->request->query['color_id'] as $item){
		// 		$color['OR'][] = array('Product.color_id LIKE ' => '%'.$item.'%');
		// 	}
		// }else{ $color = ""; }

		// if(isset($this->request->query['material_id']) && !empty($this->request->query['material_id'])){
		// 	foreach($this->request->query['material_id'] as $item){
		// 		$material['OR'][] = array('Product.material_id LIKE' => '%'.$item.'%');
		// 	}
		// }else{ $material = ""; }

		if(isset($this->request->query['v_id']) && !empty($this->request->query['volume_id'])){
			foreach($this->request->query['volume_id'] as $item){
				$volume['OR'][] = array('Product.volume_id LIKE' => '%'.$item.'%');
			}
		}else{ $volume = ""; }

		// $type = (!empty($this->request->query['type'])) ? array('Product.type' => $this->request->query['type'])  : "";

		$order = array('Product.id' => 'desc');

		// if(isset($this->request->query['sort_by_price']) && $this->request->query['sort_by_price'] == 'increase'){
		// 	$order = array('Product.price_item' => 'ASC');
		// }

		// if(isset($this->request->query['sort_by_price']) && $this->request->query['sort_by_price'] == 'dicrease'){
		// 	$order = array('Product.price_item' => 'DESC');
		// }

		$this->Paginator->settings = array(
			'conditions' => array(
				
				// $sort,
				// $volume,
				// $price_from,
				// $price_to,
				$type,
				// $color,
				// $material,
				// $in_stock,
				// $name,
				// array('Product.active' => 1)
				),
		// 'conditions' => array('Product.title LIKE' => '%' . $search . '%'),
		// 'fields' => array('id', 'title', 'price', 'img'),
		// 'recursive' => -1,
		'limit' => 12,
		'order' => $order
		);
		$products = $this->Paginator->paginate('Product');
		$types = $this->Type->find('all');
		$title_for_layout = 'Каталог товаров';

		$this->set(compact('products', 'title_for_layout', 'types', 'colors', 'volumes'));
	}


	public function index(){
		$l = Configure::read('Config.language');
		$this->Manufacturer->locale = $l;
		$this->Share->locale = $l;
		
		$f_type = (isset($this->request->query['type'])) ?  $this->request->query['type'] : "";

		$f_shape = (isset($this->request->query['shape'])) ?  $this->request->query['shape'] : "";

		$f_period = (isset($this->request->query['period'])) ? $this->request->query['period']  : "";

		$f_crop = (isset($this->request->query['crop'])) ?  $this->request->query['crop']  : "";

		$f_sort = (isset($this->request->query['sort'])) ?  $this->request->query['sort']  : "";
		
		// $special_offer = $this->Product->find('first', array(
		// 	'conditions' => array('Product.special_offer' => true),
		// 	'order' =>array('Product.created' => 'desc'),
		// 	'limit'=>1
		// ));
		
		$products = $this->_filters($f_type, $f_shape, $f_period, $f_crop, $f_sort);
		// debug($products);die;
		$manufacturers = $this->Manufacturer->find('all');
		$share = $this->Share->find('all', array(
			'order' => array('Share.id' => 'DESC')
		));
		$types = $this->Type->find('all');
		// debug($share);
		$shapes = $this->Shape->find('all');
		$periods = $this->Period->find('all');
		$crops = $this->Crop->find('all');
		$title_for_layout = "Наша продукция";
		$this->set(compact('title_for_layout', 'manufacturers','types','shapes','periods','crops','special_offer','products', 'l', 'share'));
	}

	protected function _filters($r_type, $r_shape, $r_period, $r_crop, $r_sort){
		$order = array('Product.id' => 'desc');
		$data = array();
		if($r_type || $r_shape || $r_period || $r_crop || $r_sort){

			// if($r_sort == 'novelty'){
			// 	$r_sort = $this->Product->find("all", array(
			// 		'conditions' => array('Product.novelty' => 1)
			// 	));
			// 	foreach($r_sort as $item){
			// 		$data[] = $item['Product']['id'];
			// 	}
			// }

			// if($r_sort == 'share'){
			// 	$r_sort = $this->Product->find("all", array(
			// 		'conditions' => array('Product.share' => 1)
			// 	));
			// 	foreach($r_sort as $item){
			// 		$data[] = $item['Product']['id'];
			// 	}
			// }

			if($r_sort == 'novelty'){
				$r_sort = array('Product.novelty' => 1);
			}elseif($r_sort == 'share'){
				$r_sort = array('Product.share' => 1);
			}else{
				$r_sort = "";
			}

			if(!empty($r_type) && !empty($r_type[0])){
				$r_type = implode($r_type , ',');
				$r_type = $this->Product->query("SELECT * FROM types_products WHERE type_id IN ($r_type)");
				foreach($r_type as $item){
					$data[] = $item['types_products']['product_id'];
				}

			}

			if(!empty($r_shape) && !empty($r_shape[0])){
				$r_shape = implode($r_shape , ',');
				$r_shape = $this->Product->query("SELECT * FROM shapes_products WHERE shape_id IN ($r_shape)");
				foreach($r_shape as $item){
					$data[] = $item['shapes_products']['product_id'];
				}
				
			}
// debug($r_period);die;
			if(!empty($r_period) && !empty($r_period[0])){

				$r_period = implode($r_period , ',');
				$r_period = $this->Product->query("SELECT * FROM periods_products WHERE period_id IN ($r_period)");
				foreach($r_period as $item){
					$data[] = $item['periods_products']['product_id'];
				}

				
			}

			if(!empty($r_crop) && !empty($r_crop[0])){
				$r_crop = implode($r_crop , ',');
				$r_crop = $this->Product->query("SELECT * FROM crops_products WHERE crop_id IN ($r_crop)");
				foreach($r_crop as $item){
					$data[] = $item['crops_products']['product_id'];
				}

			}
			
			$data = array_unique($data);

			$this->Paginator->settings = array(
				'conditions' => array(
					array('Product.id' => $data),
					$r_sort
					),
				'limit' => 10,
				'order' => $order,
			);
			$q = $this->Paginator->paginate('Product');
			// $q = $this->Product->find('all', array(
			// 	'conditions' => array(
			// 		// $country,
			// 		// $city,
			// 		// $type,
			// 		// $pr

			// 	),
			// 	'joins'=>array(
			// 		$j_type
			// 		// $j_specialty,
			// 		// $j_res,
			// 		// $j_intake
		           
		 //        )
			// ));
			// debug($q);die;

		}else{

			
			$this->Paginator->settings = array(
				//'conditions' => array($shape,$period,$crop),
				'limit' => 10,
				'order' => $order,
			);
			$q = $this->Paginator->paginate('Product');

			// $q = $this->Product->find('all', array(
			// 	'conditions' => array(
			// 		$country,
			// 		$city,
			// 		$type,
			// 		$pr
			// 	)
			// ));
		}
		
		return $q;
	}

	public function admin_index(){
		$this->Product->locale = array('en', 'kz');
		// $this->Product->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Product->find('all', array(
			'order' => array('Product.id' => 'DESC')
		));
		$this->set(compact('data'));
	}
	public function parents($cat_t, $search_key, &$parents)
	{	

	    foreach ($cat_t as $key => $item)
	    {	

	        if ($key == $search_key)
	        {
	            return true;
	        }
	        else if ($item && $this->parents($item, $search_key, $parents))
	        {
	            $parents[] = $key;
	            return true;
	        }
	    }
	 
	    return false;
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

	public function getParentsById($arr, $id, $response = array())
	{

	    $key = $this->get_key($arr, $id);
	    $response[$key]['title'] = $arr[$key]['title'];
	    $response[$key]['alias'] = $arr[$key]['alias'];
	    $response[$key]['id'] = $arr[$key]['id'];
	    if ($arr[$key]['parent_id'] != 0)
	    {
	        $response = $this->getParentsById($arr, $arr[$key]['parent_id'], $response);
	    }
	    return $response;
	}

	public function admin_add(){
		$this->Manufacturer->locale = Configure::read('Config.language');
		
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Product->locale = 'kz';
			$l = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Product->locale = 'en';
			$l = 'en';
		}else{
			$this->Product->locale = 'ru';
			$l = 'ru';
		}

		if($this->request->is('post')){
			$this->Product->create();
			$data = $this->request->data['Product'];
			$slug = Inflector::slug(mb_strtolower($this->request->data['Product']['title_ru']), '-');
			$data[] = $this->request->data['Product'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);
			//Проверка на уникальность alias	
			$check_alias = $this->Product->findByAlias($data['alias']);
			if(!empty($check_alias)) $data['alias'] = $data['alias'] . '-' . date("YmdHis");

			// debug($data = $this->request->data);die;
			if(!isset($data['img']['name']) || !$data['img']['name']){
				unset($data['img']);
			}
			// debug($data);die;
			if($this->Product->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);

				//добавляем виды
				$id = $this->Product->getLastInsertId();
				$t = $this->request->data['type'];
				if(isset($t)){
					for($i=0;$i<=count($t)-1;$i++){
						$t_insert = "INSERT INTO `types_products` (type_id,product_id) VALUES(".$t[$i].",".$id.") ";
						$sql = $this->Product->query($t_insert);
					}
				}

				$sh = $this->request->data['shape'];
				if(isset($sh)){
					for($i=0;$i<=count($sh)-1;$i++){
						$sh_insert = "INSERT INTO `shapes_products` (shape_id,product_id) VALUES(".$sh[$i].",".$id.") ";
						$sql = $this->Product->query($sh_insert);
					}
				}

				$p = $this->request->data['period'];
				if(isset($p)){
					for($i=0;$i<=count($p)-1;$i++){
						$p_insert = "INSERT INTO `periods_products` (period_id,product_id) VALUES(".$p[$i].",".$id.") ";
						$sql = $this->Product->query($p_insert);
					}
				}

				$c = $this->request->data['crop'];
				if(isset($c)){
					for($i=0;$i<=count($c)-1;$i++){
						$c_insert = "INSERT INTO `crops_products` (crop_id,product_id) VALUES(".$c[$i].",".$id.") ";
						$sql = $this->Product->query($c_insert);
					}
				}

				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		$manufacturers = $this->Manufacturer->find('all');
		$types = $this->Type->find('all');
		$shapes = $this->Shape->find('all');
		$periods = $this->Period->find('all');
		$crops = $this->Crop->find('all');
		$title_for_layout = 'Добавление ';
		$this->set(compact('designers', 'title_for_layout','manufacturers','types','shapes','crops','periods', 'l'));
	}

	public function admin_edit($id){
		$this->Manufacturer->locale = Configure::read('Config.language');
		
		if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
			$this->Product->locale = 'kz';
			$l = 'kz';
		}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
			$this->Product->locale = 'en';
			$l = 'en';
		}else{
			$this->Product->locale = 'ru';
			$l = 'ru';
		}
		if(is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Product->findById($id);
		//$periodProductId = explode(",", $data['Product']['period_id']);
		//$cropProductId = explode(",", $data['Product']['crop_id']);
		// $data['Product']['shape_id'] = $shapeProductId;
		// $data['Product']['period_id'] = $periodProductId;
		// $data['Product']['crop_id'] = $cropProductId;


		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Product->id = $id;
			$data1 = $this->request->data['Product'];
			// debug($data1);die;
			if(!isset($data1['novelty']) || empty($data1['novelty'])){
				$data1['novelty'] = 0;
			}
			if(!isset($data1['in_stock']) || empty($data1['in_stock'])){
				$data1['in_stock'] = 0;
			}
			if(!isset($data1['discount']) || empty($data1['discount'])){
				$data1['discount'] = 0;
			}
			if(!isset($data1['share']) || empty($data1['share'])){
				$data1['share'] = 0;
			}

			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->data['type'])){
				$t = $this->request->data['type'];
				$this->Product->query("DELETE FROM `types_products` WHERE `product_id`=$id");
				for($i=0;$i<=count($t)-1;$i++){
					$t_insert = "INSERT INTO `types_products` (type_id,product_id) VALUES(".$t[$i].",".$id.") ";
					$sql = $this->Product->query($t_insert);
				}
			}

			if(isset($this->request->data['shape'])){
				$sh = $this->request->data['shape'];
				$this->Product->query("DELETE FROM `shapes_products` WHERE `product_id`=$id");
				for($i=0;$i<=count($sh)-1;$i++){
					$sh_insert = "INSERT INTO `shapes_products` (shape_id,product_id) VALUES(".$sh[$i].",".$id.") ";
					$sql = $this->Product->query($sh_insert);
				}
			}

			if(isset($this->request->data['period'])){
				$p = $this->request->data['period'];
				$this->Product->query("DELETE FROM `periods_products` WHERE `product_id`=$id");
				for($i=0;$i<=count($p)-1;$i++){
					$p_insert = "INSERT INTO `periods_products` (period_id,product_id) VALUES(".$p[$i].",".$id.") ";
					$sql = $this->Product->query($p_insert);
				}
			}

			if(isset($this->request->data['crop'])){
				$c = $this->request->data['crop'];
				$this->Product->query("DELETE FROM `crops_products` WHERE `product_id`=$id");
				for($i=0;$i<=count($c)-1;$i++){
					$c_insert = "INSERT INTO `crops_products` (crop_id,product_id) VALUES(".$c[$i].",".$id.") ";
					$sql = $this->Product->query($c_insert);
				}
			}

			if($this->Product->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		$manufacturers = $this->Manufacturer->find('all');
		$types = $this->Type->find('all');
		$shapes = $this->Shape->find('all');
		$periods = $this->Period->find('all');
		$crops = $this->Crop->find('all');
		$advantages = $this->Advantage->find('all', array(
			'conditions' => array('Advantage.product_id' => $id)
		));
		$employments = $this->Employment->find('all', array(
			'conditions' => array('Employment.product_id' => $id)
		));
		$compositions = $this->Composition->find('all', array(
			'conditions' => array('Composition.product_id' => $id)
		));
		$photos = $this->Photo->find('all', array(
			'conditions' => array('Photo.product_id' => $id)
		));
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Редактирование';
			$this->set(compact('id', 'data', 'title_for_layout','manufacturers','types','shapes','crops','periods','l', 'advantages', 'photos','employments', 'compositions'));
		}
	}

	public function compare(){
		$title_for_layout = __('Сравнение');
		$this->set(compact('title_for_layout'));
	}

	public function view($alias){
		$l = Configure::read('Config.language');
		$this->Manufacturer->locale = $l;
		$this->Product->locale = $l;
		$this->Advantage->locale = $l;
		$data = $this->Product->findByAlias($alias);
		$id = $data['Product']['id'];
		$manufacturer = $this->Manufacturer->findById($data['Product']['manufacturer_id']);
		$advantages = $this->Advantage->find('all', array(
			'conditions' => array('Advantage.product_id' => $id)
		));
		$employments = $this->Employment->find('all', array(
			'conditions' => array('Employment.product_id' => $id)
		));
		$compositions = $this->Composition->find('all', array(
			'conditions' => array('Composition.product_id' => $id)
		));
		
		if($data['Crop']){
			foreach($data['Crop'] as $crops){
				$crops_ids[] = $crops['id'];
			}
			$r_crop = implode($crops_ids , ',');
			$r_crop = $this->Product->query("SELECT * FROM crops_products WHERE crop_id IN ($r_crop)");
			foreach($r_crop as $item){
				//ubiraem sebia, t.e. product kotorii sovpadaet s id
				if($item['crops_products']['product_id'] != $data['Product']['id']){
					$p[] = $item['crops_products']['product_id'];
				}
			}
			$p = array_unique($p); //ostavliaem tolko unikalnie
			$d = array_rand($p, 2); //vivodim tolka 2 id
			$similar[] = $p[$d[0]];
			$similar[] = $p[$d[1]];

			$other_products = $this->Product->find('all', array(
				'conditions' => array('Product.id' => $similar),
				'limit' => 2
			));
		}else{
			$other_products = $this->Product->find('all', array(
				'conditions' => array('Product.id !=' => $id),
				'limit' => 2
			));
		}
			
		$title_for_layout = $data['Product']['title_'.$l];
		$meta['keywords'] = $data['Product']['keywords_'.$l];
		$meta['description'] = $data['Product']['description_'.$l];
		// $periods = $this->Product->Period->find('all', array(
		// 	'conditions' => array('Period.product_id' => $data['Product']['id'])
		// ));
		// $periods = $this->Product->query("SELECT * FROM periods_programs WHERE `product_id` = $id");

		// $s = $this->Product->query("SELECT `pp`.`id`, `pp`.`product_id`, `pp`.`period_id`, `p`.`title` AS `l_title`,  FROM `periods_products` pp LEFT JOIN `periods` p ON `pp`.`period_id`=`p`.`id`  WHERE `pp`.`product_id`= $id");

		// debug($advantages);die;
		$this->set(compact('data', 'title_for_layout', 'meta', 'similar', 'images','reversed','manufacturer', 'l', 'advantages','employments','compositions', 'other_products'));
	}

	public function admin_delete($id){
		if (!$this->Product->exists($id)) {
			throw new NotFoundException('Такой статьи нет');
		}
		if($this->Product->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function search(){
		if(isset($_GET['q']) && !empty($_GET['q'])){
			$search = $_GET['q'];
			$data = $this->Product->find('all', array(
				'conditions' => array('Product.title LIKE' => '%' . $search . '%'),
			));

			debug($data);
			die;
		}
		
	}

	public function admin_insert_photo(){
		$this->autoRender = false;
		if($this->request->is('post')){
			$data = $this->request->data['Photo'];
			// debug($data);die;
			if(isset($data['img'][0])){
				$img_count = count($data['img']);
				$new_img = $data['img'];
				unset($data['img']);
				$id = $data['product_id'];
				for($i = 0; $i <= $img_count-1; $i++){
					// debug($new_img[1]);die;
					$img_name = $this->customUploadImg($new_img[$i]);

					$q = "INSERT INTO photos (product_id, img) VALUES ($id,  '".$img_name."')";
					$this->Product->query($q);
					
					$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				}
			
			}
		}
		return $this->redirect($this->referer());
	}

	
	public function customUploadImg($file = array()){
		// debug($file);die;
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/photos/' . $fileName;
		$path_th = WWW_ROOT . 'img/photos/thumbs/' . $fileName;
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}
		$this->resizeImg($path, $path_th, 480, 480, $ext);
		// debug($fileName);die;
		return $fileName;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/photos/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}

	public function resizeImg($target, $dest, $wmax = 269, $hmax = 178, $ext){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
		*/
		list($w_orig, $h_orig) = getimagesize($target);
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		if(($wmax / $hmax) > $ratio){
			$wmax = $hmax * $ratio;
		}else{
			$hmax = $wmax / $ratio;
		}
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = imagecreatefromgif($target);
				break;
			case("png"):
				$img = imagecreatefrompng($target);
				break;
			default:
				$img = imagecreatefromjpeg($target);    
		}
		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
		
		if($ext == "png"){
			imagesavealpha($newImg, true); // сохранение альфа канала
			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
			imagefill($newImg, 0, 0, $transPng); // заливка  
		}
		
		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
		switch($ext){
			case("gif"):
				imagegif($newImg, $dest);
				break;
			case("png"):
				imagepng($newImg, $dest);
				break;
			default:
				imagejpeg($newImg, $dest);    
		}
		imagedestroy($newImg);
	}
	
}