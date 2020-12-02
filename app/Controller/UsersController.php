<?php

class UsersController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index()
	{
		$users = $this->User->find('all', array(
			'recursive' => -1,
			'fields' => array('User.id', 'User.username', 'User.full_name', 'User.created'),
			'conditions' => array('User.deleted' => 0)
		));

		$this->set(compact('users'));
	}
}
