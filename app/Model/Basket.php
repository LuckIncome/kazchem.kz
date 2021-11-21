<?php 

class Basket extends AppModel{
	
	public $validate = array(
		
		'kp' => array(
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
				'rule' => array('fileSize', '<=', '20MB'),
				'message' => 'Максимальный размер картинки 20MB'
			),
			'customUploadDocRu' => array(
				'rule' => 'customUploadDocRu',
				'message' => 'Ошибка обработки файла'
			)
		),
		
	);


	public function customUploadDocRu($file = array()){
		if(!is_uploaded_file($file['kp']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['kp']['name']));
		$fileName = $this->genNameBook($ext);
		$path = WWW_ROOT . 'files/basket/' . $fileName;
		// $path_th = WWW_ROOT . 'img/docs/thumbs/' . $fileName;
		if(!move_uploaded_file($file['kp']['tmp_name'], $path)){
			return false;
		}
		// $this->resizeImg($path, $path_th, 235, 311, $ext);
		$this->data[$this->alias]['kp'] = $fileName;
		return true;
	}
	
	public function genNameBook($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'files/basket/' . $name)){
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