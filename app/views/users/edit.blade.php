@extends('layouts.master')

@section('content')

	<h1>Edit User</h1>

	<hr>

	{{ Form::model($user, array('method' => 'PUT', 'route' => array('admin.users.update', $user->id), 'id' => 'user')) }}
	
		@include('users._form')

	{{ Form::close() }}

@stop