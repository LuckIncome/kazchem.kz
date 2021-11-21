<?php 

class Doc extends AppModel{

	// public $belongsTo = 'Product';
	public $actsAs = array(
		'Translate' => array(
			'title'
			)
		);
	
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		),
		'img' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			// 'mimeType' => array(
			// 	'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
			// 	'message' => 'Ошибка загрузки картинки'
			// ),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '2MB'),
				'message' => 'Максимальный размер картинки 2MB'
			),
			'customUploadImg' => array(
				'rule' => 'customUploadImg',
				'message' => 'Ошибка обработки картинки'
			)
		),
		'doc_ru' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			// 'mimeType' => array(
			// 	'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
			// 	'message' => 'Ошибка загрузки картинки'
			// ),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '100MB'),
				'message' => 'Максимальный размер картинки 100MB'
			),
			'customUploadDocRu' => array(
				'rule' => 'customUploadDocRu',
				'message' => 'Ошибка обработки файла'
			)
		),
		'doc_kz' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			// 'mimeType' => array(
			// 	'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
			// 	'message' => 'Ошибка загрузки картинки'
			// ),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '100MB'),
				'message' => 'Максимальный размер картинки 100MB'
			),
			'customUploadDocKz' => array(
				'rule' => 'customUploadDocKz',
				'message' => 'Ошибка обработки файла'
			)
		),
		'doc_en' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			// 'mimeType' => array(
			// 	'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
			// 	'message' => 'Ошибка загрузки картинки'
			// ),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '100MB'),
				'message' => 'Максимальный размер картинки 100MB'
			),
			'customUploadDocEn' => array(
				'rule' => 'customUploadDocEn',
				'message' => 'Ошибка обработки файла'
			)
		),
	);

	public function customUploadImg($file = array()){
		if(!is_uploaded_file($file['img']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['img']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'img/docs/' . $fileName;
		$path_th = WWW_ROOT . 'img/docs/thumbs/' . $fileName;
		if(!move_uploaded_file($file['img']['tmp_name'], $path)){
			return false;
		}
		$this->resizeImg($path, $path_th, 214, 280, $ext);
		$this->data[$this->alias]['img'] = $fileName;
		return true;
	}

	public function customUploadDocRu($file = array()){
		if(!is_uploaded_file($file['doc_ru']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['doc_ru']['name']));
		$fileName = $this->genNameBook($ext);
		$path = WWW_ROOT . 'files/docs/' . $fileName;
		// $path_th = WWW_ROOT . 'img/docs/thumbs/' . $fileName;
		if(!move_uploaded_file($file['doc_ru']['tmp_name'], $path)){
			return false;
		}
		// $this->resizeImg($path, $path_th, 235, 311, $ext);
		$this->data[$this->alias]['doc_ru'] = $fileName;
		return true;
	}
	public function customUploadDocKz($file = array()){
		if(!is_uploaded_file($file['doc_kz']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['doc_kz']['name']));
		$fileName = $this->genNameBook($ext);
		$path = WWW_ROOT . 'files/docs/' . $fileName;
		// $path_th = WWW_ROOT . 'img/docs/thumbs/' . $fileName;
		if(!move_uploaded_file($file['doc_kz']['tmp_name'], $path)){
			return false;
		}
		// $this->resizeImg($path, $path_th, 235, 311, $ext);
		$this->data[$this->alias]['doc_kz'] = $fileName;
		return true;
	}
	public function customUploadDocEn($file = array()){
		if(!is_uploaded_file($file['doc_en']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['doc_en']['name']));
		$fileName = $this->genNameBook($ext);
		$path = WWW_ROOT . 'files/docs/' . $fileName;
		// $path_th = WWW_ROOT . 'img/docs/thumbs/' . $fileName;
		if(!move_uploaded_file($file['doc_en']['tmp_name'], $path)){
			return false;
		}
		// $this->resizeImg($path, $path_th, 235, 311, $ext);
		$this->data[$this->alias]['doc_en'] = $fileName;
		return true;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/docs/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}
	public function genNameBook($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'files/docs/' . $name)){
			$name = $this->genNameBook($ext);
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