<?php

class PostsController extends AppController
{
	public $helpers = ['Html', 'Form'];

	public function index()
	{
		$this->set('posts', $this->Post->find('all'));
	}
}
