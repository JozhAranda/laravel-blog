<?php

class LoginController extends BaseController {

    public function index()
    {
        return View::make('login.index');
    }

    public function sign_in() 
    {
        $json = array('success' => false);

        $credentials = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($credentials))
        {
            $acl  = array('admin' => url('admin/users'), 'member' => url('member/posts'));

            $user = Auth::user();

            $json['redirect'] = $acl[$user->role];

            $json['success']  = true;
        }

        return json_encode($json);
    }

	public function sign_out()
	{
		Auth::logout();

		return Redirect::to('/');
	}

}
