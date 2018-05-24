@extends('partials.master')

@section('content-main')
	<h1>Dashboard</h1>
	<p>Hei {{ $user->name }}</p>

	@role('superadmin|admin')
		I am a superadmin!
	@else
		I am not a superadmin...
	@endrole
@endsection
