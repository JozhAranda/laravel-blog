<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');


Route::get('signup', 'SignupController@create');

Route::post('signup', 'SignupController@store');


Route::get('login', 'LoginController@index');

Route::post('login', 'LoginController@sign_in');

Route::get('logout', 'LoginController@sign_out');


Route::get('password/remind', 'RemindersController@remind');

Route::post('password/remind', 'RemindersController@request');

Route::get('password/reset/{token}', 'RemindersController@reset');

Route::post('password/reset', 'RemindersController@update');


Route::group(array('prefix' => 'member', 'before' => 'auth'), function()
{
    Route::resource('posts', 'PostsController');
});


Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    Route::resource('users', 'UsersController');
});
