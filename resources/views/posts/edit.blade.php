@extends('layouts.master')

@section('content')

<h1>Update a post</h1>

<form method="POST" action="{{ action('PostsController@update', [$post->id]) }}">
	@include('partials.posts_form')

	<input type="submit" class="col-sm-3 btn btn-default" value="Update post">

	{{ method_field('PUT') }}
</form>

<form method="POST" action="{{ action('PostsController@destroy', [$post->id]) }}">

	<input type="submit" class="col-sm-3 btn btn-default" value="Delete post">

	{{ method_field('DELETE') }}
</form>

@stop