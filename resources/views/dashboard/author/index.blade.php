@extends('partials.master')

@section('content-main')
	<h1>Author Dashboard</h1>
	<p>Hei {{ $user->name }}</p>

	@foreach ($entry_types as $entry_type)
		<a href="{{ route('dashboard.author.entry_type', $entry_type) }}">{{ $entry_type->name }}</a><br>
	@endforeach

	@role('admin')
		I am a admin! <br>
	@else
		I am not a admin... <br>
	@endrole
@endsection
