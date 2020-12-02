<?php

class PostsController extends AppController
{
	public $helpers = ['Html', 'Form'];

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
}
