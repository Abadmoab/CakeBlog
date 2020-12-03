<?php

class UsersController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout');
	}

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

	public function login()
	{
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Username or Password incorrect!');
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function edit($user = null)
	{
		if (!$user = $this->User->findById($user)) {
			throw new NotFoundException('User not found.');
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->User->id = $user['User']['id'];
			if ($this->User->save($this->request->data)) {
				$this->Flash->success('User was updated successfully.');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error('Unable to update user.');
		}

		if (!$this->request->data) {
			$this->request->data = $user;
		}
	}

	public function delete($user = null)
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException('GET method not allowed for this route.');
		}

		if (!$this->User->delete($user)) {
			$this->Flash->success('User was deleted successfully.');
		} else {
			$this->Flash->error('Unable to delete user.');
		}

		return $this->redirect(array('action' => 'index'));
	}
}
