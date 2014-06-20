@extends('layouts.master')

@section('content')

	<h1>Create Post</h1>

	<hr>

	{{ Form::model($post, array('route' => 'member.posts.store', 'id' => 'post')) }}
	
		@include('posts._form')

	{{ Form::close() }}

@stop