@extends('partials.master')
@section('content-main')
	<article class="page-section article-main">
		<div class="inner-wrapper">
			<h1 class="page-title">{{ $entry->name }}</h1>
			<div class="content-text">
				<p>For {{ $entry->created_at->diffForHumans() }} av {{ $entry->author->name }}</p>
				{!! $entry->entry_content->first()->html_content !!}
			</div>
			@role('author')
				<a href="{{ route('blog.edit', $entry) }}">Rediger</a>
			@endrole
		</div>
	</article>
@endsection
