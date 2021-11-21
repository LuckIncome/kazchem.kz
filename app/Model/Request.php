<?php 

class Request extends AppModel{

	public $validate = array(
		'phone' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите телефон'
		),
		'email' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите email'
		),
		'resume' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки файла',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('application/msword', 'application/vnd.ms-office')),
				'message' => 'Ошибка загрузки файла'
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '2MB'),
				'message' => 'Максимальный размер файла 2MB'
			),
			'customUploadImg' => array(
				'rule' => 'customUploadImg',
				'message' => 'Ошибка обработки файла '
			)
		)
	);

	public function customUploadImg($file = array()){
		if(!is_uploaded_file($file['resume']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['resume']['name']));
		$fileName = $this->genNameFile($ext);
		$path = WWW_ROOT . 'files/resumes/' . $fileName;
		if(!move_uploaded_file($file['resume']['tmp_name'], $path)){
			return false;
		}
		$this->data[$this->alias]['resume'] = $fileName;
		return true;
	}

	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'files/resumes/' . $name)){
			$name = $this->genNameFile($ext);
		}
		return $name;
	}
	public function resizeImg($target, $dest, $wmax = 647, $hmax = 647, $ext){
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