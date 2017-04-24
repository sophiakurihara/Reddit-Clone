@extends('layouts.master')

@section('content')

	@foreach (range($start, $end) as $number)
		<h1>{{ $number }}</h1>
	@endforeach

@stop