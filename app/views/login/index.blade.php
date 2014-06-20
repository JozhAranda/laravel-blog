@extends('layouts.master')

@section('content')

	<div class="row">

		<div class="col-md-6">

			{{ Form::open(array('url' => 'login', 'id' => 'login')) }}

				<h1>Login</h1>

				<hr>

		        <div class="form-group">
		            {{ Form::label('email', 'Email Address') }}
		            {{ Form::text('email', null, array('class' => 'form-control')) }}
		        </div>

		        <div class="form-group">
		            {{ Form::label('password', 'Password') }}
		            {{ Form::password('password', array('class' => 'form-control')) }}
		        </div>

		        <div class="form-group">
		        	{{ link_to('password/remind', 'Forgot your password?') }}
		        </div>

		        <div class="form-group">
		            {{ Form::submit('Sign In', array('class' => 'btn btn-primary', 'id' => 'btn-login')) }}
		        </div>

		    {{ Form::close() }}

	    </div>

	</div>

@stop