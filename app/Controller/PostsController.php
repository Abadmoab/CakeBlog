<?php

class PostsController extends AppController
{
	public $helpers = array('Html', 'Form');

	public function index()
	{
		$this->set('posts', $this->Post->find('all'));
	}

	public function view($post = null)
	{
		if (!$post = $this->Post->findById($post)) {
			throw new NotFoundException('Invalid post.');
		}

		$this->set('post', $post);
	}

	public function add()
	{
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				return $this->redirect(['action' => 'index']);
			} else {
				throw new BadRequestException('Unable to add a new post');
			}
		}
	}

	public function edit($post = null)
	{
		if (!$post = $this->Post->findById($post)) {
			throw new NotFoundException('Invalid post.');
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->Post->id = $post['Post']['id'];
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success('Your post has been updated.');
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Unable to update your post.'));
		}

		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}
}
