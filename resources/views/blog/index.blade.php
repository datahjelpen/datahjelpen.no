@extends('partials.master')
@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Databloggen</h1>
			<div class="entries">
				@foreach ($entries as $entry)
					<div class="entry entry-{{ $loop->iteration }}">
						<img src="{{ $entry->image_overview() }}">
						<a href="{{ route('blog.show', $entry->name) }}">{{ $entry->title_overview() }}</a>
						<p>{{ $entry->author->name }}</p>
						<p>{{ $entry->date() }}</p>
				</div>
				@endforeach
			</div>
			{{ $entries->links() }}
		</div>
	</section>
@endsection
