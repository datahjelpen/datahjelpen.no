@extends('partials.master')

@section('content-main')
	@if ($current_user->id == $user->id)
		<a href="{{ route('user.settings') }}">Innstillinger</a>
	@endif
	<h1>{{ $current_user->name }}</h1>
	<img src="{{ $current_user->avatar->url }}" alt="{{ $current_user->avatar->alt_tag }}">
@endsection
