@extends('layouts.master')

@section('content')

<h1>Create a post</h1>

<form method="POST" action="{{ action('PostsController@store') }}">
	@include('partials.posts_form')

	<input type="submit" class="btn btn-default" value="Create post">
</form>
@stop