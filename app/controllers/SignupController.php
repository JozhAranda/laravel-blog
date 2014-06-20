<?php

class SignupController extends BaseController {

	public function create()
	{
		return View::make('signup.create');
	}

	public function store()
	{
		$json = array('success' => true, 'redirect' => url('member/posts'));

		try
		{
			$validator = Validator::make($data = Input::all(), User::$createRules);

			if ($validator->fails()) throw new Exception($validator->messages());

			$data['password'] = Hash::make($data['password']);

			$data['role'] = 'member';

			$user = User::create($data);

			Auth::login($user);
		}
		catch(Exception $ex)
		{
			Log::error($ex->getMessage());

			$json['success'] = false;
		}
		
		return json_encode($json);
	}

}
