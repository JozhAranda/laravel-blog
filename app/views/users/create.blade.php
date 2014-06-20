@extends('layouts.master')

@section('content')

	<h1>Create User</h1>

	<hr>

	{{ Form::model($user, array('route' => 'admin.users.store', 'id' => 'user')) }}
	
		@include('users._form')

	{{ Form::close() }}

@stop