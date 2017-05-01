@extends('layouts.master')

@section('content')

<h2>Students</h2>
	@foreach($students as $student)
	   	<article class="col-md-6">
	   		<h3>{{ $student->first_name }}</h3>
            <h4>School: {{ $student->school_name }}</h4>
            <p>Description: {{ $student->description }}</p>
            <p>Subscribed: {{ $student->subscribed }}</p>
       	</article>
	@endforeach

<div class="row">
<div class="col-md-3">
	{!! $students->render() !!}
</div>

<form method="GET" action="{{ action('StudentsController@create') }}">
	<input type="submit" class="col-md-3 btn btn-default" value="Create student">
</form>
</div>

@stop