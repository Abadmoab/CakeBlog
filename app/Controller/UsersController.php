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

	public function deleted()
	{
		$this->loadModel('Group');
		$groups = $this->Group->get(1);
		$users = $this->User->get(1);

		$this->set(compact('users', 'groups'));
	}

	public function add()
	{
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success('The user was created successfully.');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error('Registeration failed.');
		}
	}
}
