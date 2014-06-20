@extends('layouts.master')

@section('content')

	<h1>Posts</h1>

	<hr>

	<div class="form-group">
		{{ link_to_route('member.posts.create', 'Create Post', null, ['class' => 'btn btn-success']) }}
	</div>

	@if ($posts->count())

		<table class="table table-bordered table-striped">
			<colgroup>
				<col class="col-md-2">
				<col class="col-md-8">
				<col class="col-md-2">
			</colgroup>
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td>
						{{ link_to_route('member.posts.edit', 'Edit', $post->id, array('class' => 'btn btn-primary btn-xs')) }}
						{{ Form::open(array('method' => 'DELETE', 'route' => array('member.posts.destroy', $post->id))) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs destroy-user'))}}
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>

		</table>

		{{ $posts->links() }}

	@endif

@stop