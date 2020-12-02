<?php

class Post extends AppModel
{
	public $validate = [
		'title' => [
			'rule' => 'noBlank'
		],
		'body' => [
			'rule' => 'noBlank'
		]
	];
}
