@extends('layouts.master')

@section('content')

	<h1>Latest Posts</h1>

	<hr>

	<div class="row">

		<div class="col-md-6">

			@if (!$posts->count())

				<p>Welcome, currently there are no posts published.</p>

			@else

				@foreach ($posts as $post)

					<article class="posts">
						
						<h2>{{ $post->title }}</h2>

						<p>{{ $post->content }}</p>

					</article>

					<hr>

				@endforeach

				{{ $posts->links() }}

			@endif

		</div>

	</div>

@stop