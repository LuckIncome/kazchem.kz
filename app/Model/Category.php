<?php

class Category extends AppModel {
	public $validate = array(
	        'title_ru' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите название'
	        ),
	        'alias' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите alias'
	        ),
		'img' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Ошибка загрузки картинки',
				'allowEmpty' => true
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/jpg', 'image/jpeg', 'image/png', 'image/gif')),
				'message' => 'Ошибка загрузки картинки'
			),
			'fileSize' => array(
				'rule' => array('fileSize', '<=', '2MB'),
				'message' => 'Максимальный размер картинки 2MB'
			),
			'customUploadImg' => array(
				'rule' => 'customUploadImg',
				'message' => 'Ошибка обработки картинки'
			)
		),
	);

	public function customUploadImg($file = array()){
		if(!is_uploaded_file($file['img']['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['img']['name']));
		$fileName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file['img']['name']);
		$fileName = $this->change_to_lat($fileName, $ext);
		// debug($file);
		// debug($ext);
		// debug($fileName);die;
		$path = WWW_ROOT . 'img/categories/' . $fileName;
		$path_th = WWW_ROOT . 'img/categories/thumbs/' . $fileName;
		if(!move_uploaded_file($file['img']['tmp_name'], $path)){
			return false;
		}
		$this->resizeImg($path, $path_th, 140, 140, $ext);
		$this->data[$this->alias]['img'] = $fileName;
		return true;
	}


	public function genNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'img/categories/' . $name)){
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

	public function change_to_lat($data, $ext){
        $kz = array('А','а','Ә','ә','Б','б','В','в','Г','г','Ғ','ғ', 'Д','д', 'Е','е', 'Ё','ё', 'Ж','ж', 'З','з', 'И','и', 'Й','й', 'К','к', 'Қ','қ', 'Л','л', 'М','м', 'Н','н', 'Ң','ң', 'О','о','Ө','ө','П','п', 'Р','р', 'С','с', 'Т','т', 'У','у', 'Ұ','ұ', 'Ү','ү', 'Ф','ф', 'Х','х', 'Һ','һ', 'Ц','ц', 'Ч','ч', 'Ш','ш', 'Щ','щ', 'Ы','ы', 'І','і', 'Э','э', 'Ю','ю', 'Я','я', 'Ь','ь','Ъ','ъ', ' ');
        $lt = array('A','a','a','a','B','b','V','v','G','g','g','g', 'D','d', 'E','e', 'E','e', 'J','j', 'Z','z', 'i','i', 'i','i', 'K','k', 'Q','q', 'L','l', 'M','m', 'N','n', 'n','n', 'O','o','o','o','P','p', 'R','r', 'S','s', 'T','t', 'u','u', 'U','u', 'u','u', 'F','f', 'H','h', 'H','h', 'Ts','ts', 'Ch','ch', 'Sh','sh', 'Sh','sh', 'Y','y', 'I','i', 'E','E', 'iy','iy', 'ya','ya', '','','','', '_');
     
        $newphrase = strtolower(str_replace($kz, $lt, $data));
        $newphrase = preg_replace( "/[^_a-zA-ZА-Яа-я0-9\s]/", '', $newphrase );
        return $newphrase. "_" .time().".{$ext}";
    }
}