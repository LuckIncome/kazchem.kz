<?php 

class About extends AppModel{
	public $actsAs = array(
		'Translate' => array(
			'title',
			'body',
			'block_title',
			'block_text'
			)
	);
	
}