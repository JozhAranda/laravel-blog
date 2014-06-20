@extends('layouts.master')

@section('content')

	<div class="row">

		<div class="col-md-6">

			{{ Form::open(array('url' => 'password/remind', 'id' => 'remind')) }}

				<h1>Recover your password</h1>

				<hr>

		        <div class="form-group">
		            {{ Form::label('email', 'Email Address') }}
		            {{ Form::text('email', null, array('class' => 'form-control')) }}
		        </div>

		        <div class="form-group">
		            {{ Form::submit('Send Recover Email', array('class' => 'btn btn-primary', 'id' => 'btn-remind')) }}
		        </div>

		    {{ Form::close() }}

	    </div>

	</div>

@stop