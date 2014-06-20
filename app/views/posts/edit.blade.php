@extends('layouts.master')

@section('content')

	<h1>Edit Post</h1>

	<hr>

	{{ Form::model($post, array('method' => 'PUT', 'route' => array('member.posts.update', $post->id), 'id' => 'post')) }}
	
		@include('posts._form')

	{{ Form::close() }}

@stop