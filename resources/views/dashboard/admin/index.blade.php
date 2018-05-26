@extends('partials.master')

@section('content-main')
	<h1>Admin Dashboard</h1>
	<p>Hei {{ $user->name }}</p>

	<section>
		<h2>Entry Type</h2>
		<ul>
			@foreach ($entry_types as $entry_type)
				<li>
					<a href="{{ route('dashboard.author.entry_type', $entry_type) }}"><strong>{{ $entry_type->name }}</strong></a>
					| <a href="{{ route('entry_type.edit', $entry_type) }}">Rediger</a>
					| <a href="{{ route('entry_type.delete', $entry_type) }}">Slett</a>
				</li>
			@endforeach
		</ul>
		<ul>
			<li><a href="{{ route('entry_type.create') }}">Lag ny</a></li>
		</ul>
	</section>

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
