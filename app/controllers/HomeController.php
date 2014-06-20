<?php

class HomeController extends BaseController {

	public function index()
	{
		$posts = Post::paginate(10);

		return View::make('home.index', compact('posts'));
	}

}
