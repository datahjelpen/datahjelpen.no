@extends('partials.master')

@section('content-main')
	<h1>Entry Types</h1>
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
@endsection
