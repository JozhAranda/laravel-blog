@extends('layouts.master')

@section('content')

	<div class="row">

		<div class="col-md-6">

			{{ Form::open(array('url' => 'password/reset', 'id' => 'reset')) }}

				<h1>Reset your password</h1>

				<hr>

		        <div class="form-group">
		            {{ Form::label('email', 'Email Address') }}
		            {{ Form::text('email', null, array('class' => 'form-control')) }}
		        </div>

		        <div class="form-group">
		            {{ Form::label('password', 'Enter new password') }}
		            {{ Form::password('password', array('class' => 'form-control')) }}
		        </div>

		        <div class="form-group">
		            {{ Form::label('password_confirmation', 'Password confirmation') }}
		            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
		        </div>

		        <div class="form-group">
		        	{{ Form::hidden('token', $token) }}
		            {{ Form::submit('Reset Password', array('class' => 'btn btn-primary', 'id' => 'btn-remind')) }}
		        </div>

		    {{ Form::close() }}

	    </div>

	</div>

@stop