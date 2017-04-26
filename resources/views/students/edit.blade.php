@extends('layouts.master')

@section('content')
<!-- there should be a form here -->
	<h1>Update student info</h1>
	
	<form method="POST" action="{{ action('StudentsController@update') }}">
		
		@include('partials.students_form')

		<input type="submit" class="btn btn-default" value="Update Student">
		
		{{ method_field('PUT') }}
	</form>

@stop