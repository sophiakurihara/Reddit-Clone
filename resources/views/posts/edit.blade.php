@extends('layouts.master')

@section('content')

<h1>Create a post</h1>

<form method="POST" action="{{ action('PostsController@update') }}">
	@include('partials.posts_form')

	<input type="submit" class="btn btn-default" value="Update post">

	{{ method_field('PUT') }}
</form>
@stop