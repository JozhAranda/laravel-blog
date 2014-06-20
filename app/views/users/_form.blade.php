
<div class="form-group">
	{{ Form::label('email', 'Email Address') }}
	{{ Form::text('email', null, array('class' => 'form-control')) }}
</div>

@if (!$user->exists)
	<div class="form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
@endif

<div class="form-group">
	{{ Form::label('first_name', 'First name') }}
	{{ Form::text('first_name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('last_name', 'Last name') }}
	{{ Form::text('last_name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	<input type="button" id="referer" class="btn btn-default" value="Cancel">
	{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
</div>
