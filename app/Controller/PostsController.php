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
}
