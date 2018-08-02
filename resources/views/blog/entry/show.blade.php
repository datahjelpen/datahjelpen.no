@extends('partials.master')
@section('content-main')
	<article class="page-section article-main">
		<div class="inner-wrapper">
			<h1 class="page-title">{!! old('content', isset($entry->name) ? $entry->name : null) !!}</h1>
			<div class="content-text">
				{!! old('content', isset($entry->name) ? $entry->name : null) !!}
			</div>
		</div>
	</article>
@endsection
