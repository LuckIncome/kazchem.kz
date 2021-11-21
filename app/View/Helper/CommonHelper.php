<?php 
App::uses('AppHelper', 'View/Helper');
class CommonHelper extends AppHelper {

	public function get_day($date){
		$date = substr($date, 0, 10);
		$date = explode("-", $date);
		return $date[2];
	}
	public function beauty_date($date){
		$date = explode("-", $date);
		switch ($date[1]) {
			case 1: $date[1] = __('январь'); break;
			case 2: $date[1] = __('февраль'); break;
			case 3: $date[1] = __('март'); break;
			case 4:	$date[1] = __('апрель'); break;
			case 5: $date[1] = __('май'); break;
			case 6: $date[1] = __('июнь'); break;
			case 7: $date[1] = __('июль'); break;
			case 8: $date[1] = __('август'); break;
			case 9: $date[1] = __('сентябрь'); break; 
			case 10: $date[1] = __('октябрь'); break;
			case 11: $date[1] = __('ноябрь'); break;
			case 12: $date[1] = __('декабрь'); break;
			default: break;
		}
		return $date[2] ." ". $date[1] ." ". $date[0];
	}
	public function get_month_title($date){
		$date = substr($date, 0, 10);
		$date = explode("-", $date);
		switch ($date[1]) {
			case 1: $date[1] = __('января'); break;
			case 2: $date[1] = __('февраля'); break;
			case 3: $date[1] = __('марта'); break;
			case 4:	$date[1] = __('апреля'); break;
			case 5: $date[1] = __('май'); break;
			case 6: $date[1] = __('июня'); break;
			case 7: $date[1] = __('июля'); break;
			case 8: $date[1] = __('августа'); break;
			case 9: $date[1] = __('сентября'); break; 
			case 10: $date[1] = __('октября'); break;
			case 11: $date[1] = __('ноября'); break;
			case 12: $date[1] = __('декабря'); break;
			default: break;
		}
		return $date[1];
	}
	public function regionname($value){
		switch ($value) {
		    case 'akmola':
		        echo __('Акмолинская область');
		        break;
		    case 'aktobe':
		        echo  __('Актюбинская область');
		        break;
	         case 'almaty':
		        echo __('Алматинская область');
		        break;
	         case 'atiray':
		        echo __('Атырауская область');
		        break;
	          case 'vko':
		        echo __('Восточно-Казахстанская  область');
		        break;
	         case 'zhambyl':
		        echo __('Жамбылская область');
		        break;
	         case 'zko':
		        echo __('Западно-Казахстанская область');
		        break;
	         case 'karaganda':
		        echo __('Карагандинская область');
		        break;
	         case 'kostanai':
		        echo __('Костанайская область');
		        break;
	         case 'kyzylorda':
		        echo __('Кызылординская область');
		        break;
	         case 'mangistay':
		        echo __('Мангистауская область');
		        break;
	         case 'pavlodar':
		        echo __('Павлодарская область');
		        break;
	         case 'sko':
		        echo __('Северо-Казахстанская область');
		        break;
	         case 'turkestan':
		        echo __('Туркестанская область');
		        break;
		        case 'nursultan':
		        echo __('Нур-Султан');
		        break;
		        case 'almaty_city':
		        echo __('Алматы');
		        break;
		        case 'shymkent':
		        echo __('Шымкент');
		        break;
		}
	}
	public function get_month_and_year($date){
		$date = explode("-", $date);
		
		return $date[1] .", ". $date[0];
	}

	public function get_element($id) {
    	App::import("Model", "Comp");  
		$model = new Comp();
		$model->locale = Configure::read('Config.language');
		$data = $model->findById($id);
		// debug($data);
		if($data){
			if($data['Comp']['body']){
				return $data['Comp']['body'];
			}else{
				return $data[0]['Comp__i18n_body'];
			}
			
		}else{
			$model->locale = 'ru';
			$data = $model->findById($id);
			if($data['Comp']['body']){
				return $data['Comp']['body'];
			}else{
				return $data[0]['Comp__i18n_body'];
			}
		}
		
    }

    public function get_params($data) {
    	$l = Configure::read('Config.language');
    	$title_ru = '';
    	if($data){
    		foreach($data as $item){
		    	$title_ru .= $item['title_'.$l] . ', ';
			}
			return trim($title_ru, ', ');
    	}else{
    		return '';
    	}
		
    }

    public function get_anketa($user_id,$name) {
    	// debug($user_id);die;
    	App::import("Model", "UsersField");  
		$model = new UsersField();
		// $model->locale = Configure::read('Config.language');
		$data = $model->find('first', array(
			'conditions' => array('UsersField.user_id' => $user_id, 'UsersField.name' => $name)
		));			
		//debug($data);die;
		if($data){
			return $data['UsersField']['value'];
		}else{
			
			return '';
			
		}
		
    }


    public function get_month($date){
		$date = explode("-", $date);
		switch ($date[1]) {
			case 1: $date[1] = __('янв'); break;
			case 2: $date[1] = __('фев'); break;
			case 3: $date[1] = __('мар'); break;
			case 4:	$date[1] = __('апр'); break;
			case 5: $date[1] = __('май'); break;
			case 6: $date[1] = __('июн'); break;
			case 7: $date[1] = __('июл'); break;
			case 8: $date[1] = __('авг'); break;
			case 9: $date[1] = __('сен'); break; 
			case 10: $date[1] = __('окт'); break;
			case 11: $date[1] = __('ноя'); break;
			case 12: $date[1] = __('дек'); break;
			default: break;
		}
		return $date[2] . " " . $date[1] ." ". $date[0];
	}
	
	public function get_vagon($id){
		$content = file_get_contents("https://www.railwagonlocation.com/xml/export.php?name=kazchemicals_XML&password=iGwwakAe&request_type=view_vagon&vagon_no=$id");
		// 64257280
		
		$p = xml_parser_create();
		xml_parse_into_struct($p, $content, $vals, $index);
		xml_parser_free($p);
		// debug($vals);die;
		$data = array();

		foreach($vals as $item){

			if($item['tag'] == 'FROM_NAME' && isset($item['value'])) $data['FROM_NAME'] = $item['value'];

			if($item['tag'] == 'TO_NAME' && isset($item['value'])) $data['TO_NAME'] = $item['value'];

			if($item['tag'] == 'SEND_DATE_TIME' && isset($item['value'])) $data['SEND_DATE_TIME'] = $item['value'];

			if($item['tag'] == 'CURRENT_POSITION' && isset($item['value'])) $data['CURRENT_POSITION'] = $item['value'];

			if($item['tag'] == 'CURRENT_POSITION_DATE' && isset($item['value'])) $data['CURRENT_POSITION_DATE'] = $item['value'];

			if($item['tag'] == 'DISTANCE_END' && isset($item['value'])) $data['DISTANCE_END'] = $item['value'];

			if($item['tag'] == 'STATE' && isset($item['value'])) $data['STATE'] = $item['value'];
			
			if($item['tag'] == 'UPDATE_TIME' && isset($item['value'])) $data['UPDATE_TIME'] = $item['value'];

			if($item['tag'] == 'OPERATION' && isset($item['value'])) $data['OPERATION'] = $item['value'];

			if($item['tag'] == 'TRAIN_NUMBER' && isset($item['value'])) $data['TRAIN_NUMBER'] = $item['value'];

			if($item['tag'] == 'WEIGHT' && isset($item['value'])) $data['WEIGHT'] = $item['value'];
			if($item['tag'] == 'TRAIN_NUMBER' && isset($item['value'])) $data['TRAIN_NUMBER'] = $item['value'];
			if($item['tag'] == 'NOMER_NAKLADNOI' && isset($item['value'])) $data['NOMER_NAKLADNOI'] = $item['value'];

			if($item['tag'] == 'DAYS_END' && isset($item['value'])) $data['DAYS_END'] = $item['value'];
			if($item['tag'] == 'ARRIVED' && isset($item['value'])) $data['ARRIVED'] = $item['value'];
		}
		return $data;
	}

	public function get_user($id) {
    	App::import("Model", "User");  
		$model = new User();
		$data = $model->findById($id);
		if($data){
			return $data;
		}else{
			return array();
		}
		
    }

}

