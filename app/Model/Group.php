<?php

class Group extends AppModel
{
	public function get($deleted = 0)
	{
		return $this->find('list', array(
			'recursive' => -1,
			'fields' => array('Group.id', 'Group.name'),
			'conditions' => array('Group.deleted = ' . $deleted)
		));
	}
}
