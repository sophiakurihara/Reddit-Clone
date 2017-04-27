@extends('layouts.master')

@section('content')
<h2>Students</h2>
<table class="table table-striped">
	<tr>
		<th>First Name</th>
		<th>Description</th>
		<th>Subscription</th>
		<th>School Name</th>
	</tr>
	@foreach($students as $student)
	
	<tr>
		<td>{{ $student->first_name }}</td>
		<td>{{ $student->description }}</td>
		<td>{{ $student->subscribed }}</td>
		<td>{{ $student->school_name }}</td>
	</tr>
	
	@endforeach
</table>

@stop