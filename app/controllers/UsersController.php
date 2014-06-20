<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::where('role', 'member')->orderBy('id', 'desc')->paginate(10);

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = new User;

		return View::make('users.create', compact('user'));
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$json = array('success' => true);

		try
		{
			$input = Input::all();

			$validator = Validator::make($input, User::$createRules);

			if ($validator->fails()) throw new Exception($validator->messages());

			$user = new User($input);

			$user->password = Hash::make($input['password']);

			$user->role = 'member';

			$user->save();

		}
		catch(Exception $ex)
		{
			Log::error($ex->getMessage());

			$json['success'] = false;
		}
		
		return json_encode($json);
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
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

			$validator = Validator::make($input, User::$updateRules);

			if ($validator->fails()) throw new Exception($validator->messages());

			$user = User::find($id);

			$user->update($input);
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
		User::destroy($id);

		return Redirect::route('admin.users.index');
	}

}