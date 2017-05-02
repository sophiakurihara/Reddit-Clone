@extends('layouts.master')

@section('more_css')
	<link rel="stylesheet" href="/css/home.css">

@stop

@section('content')

	@if (Auth::check())
   		<h1>Hello, {{ Auth::user()->name }}!</h1>
   		<img src="/img/kermit.jpg" id="kermit">
   	<div class="col-md-6">
   		<form method="GET" action="{{ action('PostsController@create') }}">
			<input type="submit" class="col-md-3 btn btn-success" value="Create a post">
		</form>
		<form method="GET" action="{{ action('StudentsController@create') }}">
			<input type="submit" class="col-md-3 btn btn-success" value="Create a student">
		</form>
	</div>
		
	@else
	
		<h1>Ribbit...</h1>
		<img src="/img/kermit.jpg">

	@endif

@stop

