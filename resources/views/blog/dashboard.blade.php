@extends('partials.master')
@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h2>Artikler</h2>
			<p><a class="button primary" href="{{ route('blog.create') }}">Ny artikkel</a></p>
			<br>
			<div class="content-text">
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th></th>
								<th>Navn</th>
								<th>Status</th>
								<th>Forfatter</th>
								<th>Opprettet</th>
								<th>Handlinger</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($entries as $entry)
							<tr>
								<td>
									<img src="{{ $entry->image_overview() }}" width="100px">
								</td>
								<td>
									<a href="{{ route('blog.show', $entry) }}" title="{{ $entry->title_overview() }}">{{ substr($entry->title_overview(), 0, 25) }}</a>
								</td>
								<td>
									{{ $entry->entry_type->name }}
								</td>
								<td>
									{{ $entry->author->name }}
								</td>
								<td title="{{ $entry->created_at->toDateTimeString() }} ({{ $entry->created_at->diffForHumans() }})">
									{{ $entry->date() }}
								</td>
								<td>
										<a class="button" href="{{ route('blog.edit', $entry) }}">
											<i class="icon" data-feather="edit"></i>
											<span>Rediger</span>
										</a>
									<p>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ $entries->links() }}
			</div>
		</div>
	</section>
@endsection
