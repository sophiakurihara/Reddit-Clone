@extends('layouts.master')

@section('more_css')
	<link rel="stylesheet" href="/css/home.css">

@stop

@section('content')

	@if ($name !== 'World')
    	
   		<h1>Hello, {{ $name }}!</h1>
		
	@else
	
		<p>Do you have a name?</p>

	@endif

@stop

