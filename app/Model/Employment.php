<?php 

class Employment extends AppModel{
	// public $actsAs = array(
	// 	'Translate' => array(
	// 		'title',
	// 		)
	// );
	public $validate = array(
		'title_ru' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите описание'
		)
		
	);

}