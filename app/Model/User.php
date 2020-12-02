<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
	public $validate = array(
		'username' => array(
			'required' => array('rule' => 'notBlank', 'message' => 'Username is required.')
		),
		'password' => array(
			'required' => array('rule' => 'notBlank', 'message' => 'Password is required.')
		),
		'first_name' => array(
			'required' => array('rule' => 'notBlank', 'message' => 'First name is required.')
		),
		'family_name' => array(
			'required' => array('rule' => 'notBlank', 'message' => 'Family nmae is required.')
		),
		'role_id' => array(
			'required' => array('rule' => 'notBlank', 'message' => 'Role is required.')
		),
		'group_id' => array(
			'required' => array('rule' => 'notBlank', 'message' => 'Group is required.')
		),
	);

	public $virtualFields = array(
		'full_name' => 'CONCAT(User.first_name, " ", User.family_name)',
		'posts_count' => 'SELECT COUNT(1) FROM posts WHERE user_id = User.id'
	);

	public function get($deleted = 0)
	{
		return $this->find('all', array(
			'recursive' => -1,
			'fields' => array('User.id', 'User.username', 'User.full_name', 'User.created', 'Role.name', 'Group.name', 'User.posts_count'),
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

	public function beforeSave($options = [])
	{
		if (isset($this->data['User']['password'])) {
			$this->data['User']['password'] = (new BlowfishPasswordHasher)->hash($this->data['User']['password']);
		}
	}
}
