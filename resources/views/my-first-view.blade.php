@extends('layouts.master')

@section('content')

	@if ($name !== 'World')
    	
   		<h1>Hello, {{ $name }}!</h1>
		
	@else
	
		<p>Do you have a name?</p>

	@endif
		
@stop

@section('footer')

	<p>Copyright 2017</p>

@stop