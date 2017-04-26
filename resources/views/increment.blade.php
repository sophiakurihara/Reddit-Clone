@extends('layouts.master')

@section('content')
	<h3>Your number:</h3>
		{{ $int }}

	<h3>Plus one:</h3>
		{{ $inc }}

@stop