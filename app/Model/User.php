<?php

class User extends AppModel
{
	public $virtualFields = array(
		'full_name' => 'CONCAT(User.first_name, " ", User.family_name)',
	);
}
