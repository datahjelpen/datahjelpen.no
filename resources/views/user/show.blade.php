@extends('partials.master')

@section('content-main')
	@if ($current_user->id == $user->id)
		<a href="{{ route('user.settings') }}">Innstillinger</a>
	@endif
	<h1>{{ $user->name }}</h1>
@endsection
