@extends('partials.master')

@section('content-main')
	<h1>Show Entry: {{ $entry->name }}</h1>
	{{ dump($entry) }}
@endsection
