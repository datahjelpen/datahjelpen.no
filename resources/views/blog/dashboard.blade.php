@extends('partials.master')
@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<td><a href="{{ route('blog.create') }}">Ny post</a></td>
			<table>
				<thead>
					<tr>
						<th>Navn</th>
						<th>Handlinger</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($entries as $entry)
					<tr>
						<td>{{ $entry->name }}</td>
						<td><a href="{{ route('blog.edit', $entry) }}">Rediger</a></td>
						<td><a href="{{ route('blog.show', $entry) }}">Vis</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>
@endsection
