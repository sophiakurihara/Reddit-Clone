@extends('layouts.master')

@section('more_css')

@stop

@section('content')
<h2>Posts</h2>
	
	@foreach(array_chunk($posts->items(), 2) as $two_posts)
	
	<div class ="row">
		@foreach($two_posts as $post)
		<article class="col-md-6">
			<h3><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></h3>
			<p>{{ $post->content }}</p>
			<p>{{ $post->url }}</p>
			<p>{{ $post->user->name }}</p>
			<p>Created on: {{ $post->created_at->setTimezone('America/Chicago')->
				toDayDateTimeString() }}</p>
			@if($post->created_at != $post->updated_at)
				<p>Edited on: {{ $post->updated_at->setTimezone('America/Chicago')->
					toDayDateTimeString() }}</p>
			@endif
		</article>
		@endforeach
	</div>
	@endforeach

<div class="row">
<div class="col-md-10">
{!! $posts->render() !!}
</div>

<form method="GET" action="{{ action('PostsController@create') }}">
	<input type="submit" class="col-md-3 btn btn-primary" value="Create post">
</form>
</div>
@stop