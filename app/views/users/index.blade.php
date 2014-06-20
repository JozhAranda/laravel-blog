@extends('layouts.master')

@section('content')

	<h1>Users</h1>

	<hr>

	<div class="form-group">
		{{ link_to_route('admin.users.create', 'Create User', null, ['class' => 'btn btn-success']) }}
	</div>

	@if ($users->count())

		<table class="table table-bordered table-striped">
			<colgroup>
				<col class="col-md-2">
				<col class="col-md-4">
				<col class="col-md-4">
				<col class="col-md-2">
			</colgroup>
			<thead>
				<tr>
					<th>Id</th>
					<th>Email</th>
					<th>Name</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->first_name }} {{ $user->last_name }}</td>
					<td>
						{{ link_to_route('admin.users.edit', 'Edit', $user->id, array('class' => 'btn btn-primary btn-xs')) }}
						{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs destroy-user'))}}
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>

		</table>

		{{ $users->links() }}

	@endif

@stop