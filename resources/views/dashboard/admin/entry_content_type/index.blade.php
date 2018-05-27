@extends('partials.master')

@section('content-main')
	<h1>Entry Content Types</h1>
	<ul>
		@foreach ($entry_content_types as $entry_content_type)
			<li>
				<strong>{{ $entry_content_type->name }}</strong>
				| <a href="{{ route('entry_content_type.edit', $entry_content_type) }}">Rediger</a>
				| <a href="{{ route('entry_content_type.delete', $entry_content_type) }}">Slett</a>
			</li>
		@endforeach
	</ul>
	<ul>
		<li><a href="{{ route('entry_content_type.create') }}">Lag ny</a></li>
	</ul>
@endsection
