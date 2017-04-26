@extends('layouts.master')

@section('content')
<h2>Posts</h2>
<table class="table-striped">
	<tr>
		<th>Title</th>
		<th>Content</th>
		<th>URL</th>
		<th>Created By</th>
	</tr>
	@foreach($posts as $post)
	<tr>
		<td><a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</td>
		<td>{{ $post->content }}</td>
		<td>{{ $post->url }}</td>
		<td>{{ $post->created_by }}</td>
	</tr>
	@endforeach
</table>
@stop