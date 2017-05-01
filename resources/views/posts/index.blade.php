@extends('layouts.master')

@section('more_css')
<style>
		.row {
			position: relative;
			clear:left;
			left: 50%;
		}
		.btn-primary {
			position: relative;
			clear: left;
		}
	}
</style>

@stop

@section('content')
<h2>Posts</h2>
	@foreach($posts as $post)
		<article class="col-md-6">
			<h3><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a></h3>
			<p>{{ $post->content }}</p>
			<p>{{ $post->url }}</p>
			<p>{{ $post->created_by }}</p>
			<p>Created on: {{ $post->created_at->setTimezone('America/Chicago')->
				toDayDateTimeString() }}</p>
			@if($post->created_at != $post->updated_at)
				<p>Edited on: {{ $post->updated_at->setTimezone('America/Chicago')->
					toDayDateTimeString() }}</p>
			@endif
		</article>
	@endforeach

<div class="row">
<div class="col-md-3">
{!! $posts->render() !!}
</div>

<form method="GET" action="{{ action('PostsController@create') }}">
	<input type="submit" class="col-md-3 btn btn-primary" value="Create post">
</form>
</div>
@stop