<?php

class User extends AppModel
{
	public $virtualFields = array(
		'full_name' => 'CONCAT(User.first_name, " ", User.family_name)',
	);

	public function get($deleted = 0)
	{
		return $this->find('all', array(
			'recursive' => -1,
			'fields' => array('User.id', 'User.username', 'User.full_name', 'User.created', 'Role.name', 'Group.name'),
			'conditions' => array('User.deleted = ' . $deleted),
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
	}
}
