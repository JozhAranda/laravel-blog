@extends('layouts.master')

@section('content')

	<div class="row">

		<div class="col-md-6">

			{{ Form::open(array('url' => 'signup', 'id' => 'signup')) }}

				<h1>Signup for free</h1>

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
					{{ Form::label('first_name', 'First name') }}
					{{ Form::text('first_name', null, array('class' => 'form-control')) }}
				</div>

				<div class="form-group">
					{{ Form::label('last_name', 'Last name') }}
					{{ Form::text('last_name', null, array('class' => 'form-control')) }}
				</div>

		        <div class="form-group">
		            {{ Form::submit('Create Your Free Account', array('class' => 'btn btn-primary', 'id' => 'btn-signup')) }}
		        </div>

		    {{ Form::close() }}

	    </div>

	</div>

@stop