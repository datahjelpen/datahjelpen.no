@extends('partials.master')

@section('content-main')
	<h1>{{ $entry_type->name }}</h1>

	<h2>Entries</h2>
	<ul>
		@foreach ($entry_type->entries as $entry)
			<li>
				<a href="{{ route('entry.show', [$entry_type, $entry]) }}">{{ $entry->name }}</a>
				| <a href="{{ route('entry.edit', [$entry_type, $entry]) }}">Rediger</a>
				| <a href="{{ route('entry.delete', [$entry_type, $entry]) }}">Slett</a>
			</li>
		@endforeach
		<li><a href="{{ route('entry.create', $entry_type) }}">Lag ny</a></li>
	</ul>
@endsection
