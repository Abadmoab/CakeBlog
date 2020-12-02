<?php

class UsersController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index()
	{
		$this->loadModel('Group');
		$groups = $this->Group->get(0);
		$users = $this->User->get(0);

		$this->set(compact('users', 'groups'));
	}
}
