@extends('partials.master')

@section('content-main')
	<h1>Entry Content Types</h1>
	<ul>
		@foreach ($entry_content_types as $entry_content_type)
			<li>
				<h3>{{ $entry_content_type->name }}</h3>
				<strong>Alternativer:</strong>
				<a href="{{ route('entry_content_type.edit', $entry_content_type) }}">Rediger</a>
				| <a href="{{ route('entry_content_type.delete', $entry_content_type) }}">Slett</a>
				<br>

				<strong>Output:</strong><code>{{ $entry_content_type->output() }}</code>
				<br>

				<strong>Attributes:</strong>
				<ul>
					@foreach ($entry_content_type->html_attributes as $attribute)
						<li>
							{{ $attribute->name }}: <code>{{ $attribute->html_attribute }}</code>{{ $attribute->required ? '*' : NULL }}
							| <a href="{{ route('entry_content_type_attribute.edit', [$entry_content_type, $attribute]) }}">Rediger</a>
							| <a href="{{ route('entry_content_type_attribute.delete', [$entry_content_type, $attribute]) }}">Slett</a>
						</li>
					@endforeach
					<li><a href="{{ route('entry_content_type_attribute.create', $entry_content_type) }}">Lag ny</a></li>
				</ul>
			</li>
		@endforeach
	</ul>
	<ul>
		<li><h3><a href="{{ route('entry_content_type.create') }}">Lag ny</a></h3></li>
	</ul>
@endsection
