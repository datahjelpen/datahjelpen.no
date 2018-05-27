@extends('partials.master')

@section('content-main')
	<h1>Admin Dashboard</h1>
	<p>Hei {{ $user->name }}</p>

	<a href="{{ route('dashboard.admin.entry_types') }}">EntryTypes</a><br>

	@role('superadmin')
		I am a superadmin! <br>
	@else
		I am not a superadmin... <br>
	@endrole

	@role('admin')
		I am a admin! <br>
	@else
		I am not a admin... <br>
	@endrole

	@role('author')
		I am a author! <br>
	@else
		I am not a author... <br>
	@endrole

	@role('user_vl1')
		I am a user_vl1! <br>
	@else
		I am not a user_vl1... <br>
	@endrole

	@role('user')
		I am a user! <br>
	@else
		I am not a user... <br>
	@endrole
@endsection
