@extends('partials.master')
@section('content-head-meta-title')
	@include('partials.head-meta-title', ['title' => $entry->name . ' | ' . config('app.name_legal')])
@endsection
@section('content-head-meta-description')
	@include('partials.head-meta-description', ['description' => $entry->excerpt])
@endsection
@section('content-head-meta-image')
	@include('partials.head-meta-image', ['image' => asset(config('app.image'))])
@endsection
@section('content-head-meta-og_url_type')
	@include('partials.head-meta-og_url_type', ['url' => $entry->canonical_link, 'type' => 'article'])
@endsection
@section('content-head-meta-extra')
	<link rel="canonical" href="{{ $entry->canonical_link }}" />
	<meta property="article:published_time" content="{{ $entry->created_at->toDateTimeString() }}">
@endsection
@section('content-main')
	<article class="page-section article-main" itemscope itemtype="http://schema.org/Article">
		<div class="inner-wrapper">
			<h1 class="article-title" itemprop="name">{{ $entry->name }}</h1>
			<p class="article-meta">
				<span itemprop="author">{{ $entry->author->name }}</span>
				<span>-</span>
				<div class="hidden">
					<span title="{{ $entry->created_at->toDateTimeString() }}">{{ $entry->date }}</span>
					<meta itemprop="headline" content="{{ $entry->name }}">
					<meta itemprop="description" content="{{ $entry->excerpt }}">
					<meta itemprop="image" content="{{ asset(config('app.image')) }}">
					<meta itemprop="articleSection" content="Blogg">
					<meta itemprop="dateCreated" content="{{ $entry->created_at->toIso8601String() }}">
					<meta itemprop="datePublished" content="{{ $entry->created_at->toIso8601String() }}">
					<meta itemprop="dateModified" content="{{ $entry->updated_at->toIso8601String() }}">
					<meta itemprop="mainEntityOfPage" content="{{ $entry->canonical_link }}">
					<div itemtype="https://schema.org/Organization" itemscope="itemscope" itemprop="publisher">
						<meta itemprop="url" content="{{ config('app.url') }}">
						<meta itemprop="name" content="{{ config('app.name_legal') }}">
						<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
							<meta itemprop="url" content="{{ asset(config('app.logo')) }}">
						</span>
					</div>
				</div>
			</p>
			<div class="content-text" itemprop="articleBody">
				{!! $entry->content !!}
			</div>
			@role('author')
				<a href="{{ route('blog.edit', $entry) }}">Rediger</a>
			@endrole
		</div>
	</article>
@endsection
