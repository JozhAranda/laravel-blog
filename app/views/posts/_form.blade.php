
<div class="form-group">
	{{ Form::label('title', 'Title') }}
	{{ Form::text('title', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('content', 'Content') }}
	{{ Form::textarea('content', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	<input type="button" id="referer" class="btn btn-default" value="Cancel">
	{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
</div>
