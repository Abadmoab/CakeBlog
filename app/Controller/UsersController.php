<?php

class UsersController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index()
	{
		$users = $this->User->find('all', array(
			'recursive' => -1,
			'fields' => array('User.id', 'User.username', 'User.full_name', 'User.created', 'Role.name', 'Group.name'),
			'conditions' => array('User.deleted' => 0),
			'joins' => array(
				array(
					'table' => 'roles',
					'alias' => 'Role',
					'type' => 'inner',
					'conditions' => array('User.role_id = Role.id')
				),
				array(
					'table' => 'groups',
					'alias' => 'Group',
					'type' => 'inner',
					'conditions' => array('User.group_id = Group.id')
				)
			)
		));

		$this->set(compact('users'));
	}
}
