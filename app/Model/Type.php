<?php 

class Type extends AppModel{
	// public $actsAs = array(
	// 	'Translate' => array(
	// 		'title',
	// 		)
	// );
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		)
		
	);

}