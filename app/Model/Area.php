<?php 

class Area extends AppModel{
	
	public $validate = array(
		'title_ru' => array(
			'rule' => 'notEmpty',
			'message' => 'Введите название'
		)
		
	);

	
}