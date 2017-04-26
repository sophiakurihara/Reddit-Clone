@extends('layouts.master')

@section('content')
<!-- there should be a form here -->
	<h1>Create a student</h1>

	<form method="POST" action="{{ action('StudentsController@store') }}">
		@include('partials.students_form')

		<input type="submit" class="btn btn-default" value="Create Student">
	</form>

@stop