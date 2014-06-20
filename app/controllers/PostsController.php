<?php

class PostsController extends BaseController {

	private $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}

	/**
	 * Display a listing of Posts
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->user->posts()->orderBy('id', 'desc')->paginate(10);

		return View::make('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new Post
	 *
	 * @return Response
	 */
	public function create()
	{
		$post = new Post;

		return View::make('posts.create', compact('post'));
	}

	/**
	 * Store a newly created Post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$json = array('success' => true);

		try
		{
			$input = Input::all();

			$validator = Validator::make($input, Post::$rules);

			if ($validator->fails()) throw new Exception($validator->messages());

			$post = new Post($input);

			$post->user()->associate($this->user);

			$post->save();
		}
		catch(Exception $ex)
		{
			Log::error($ex->getMessage());

			$json['success'] = false;
		}
		
		return json_encode($json);
	}

	/**
	 * Display the specified Post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);

		return View::make('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified Post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->user->posts()->find($id);

		return View::make('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$json = array('success' => true);

		try
		{
			$input = Input::all();

			$validator = Validator::make($input, Post::$rules);

			if ($validator->fails()) throw new Exception($validator->messages());

			$post = $this->user->posts()->find($id);

			$post->update($input);
		}
		catch(Exception $ex)
		{
			Log::error($ex->getMessage());

			$json['success'] = false;
		}
		
		return json_encode($json);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = $this->user->posts()->find($id);

		$post->delete();

		return Redirect::route('member.posts.index');
	}

}