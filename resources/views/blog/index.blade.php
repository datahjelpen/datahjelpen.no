@extends('partials.master')
@section('content-main')
{{-- 	<nav id="blog-navigation">
		<img src="{{ asset(config('app.logo')) }}" alt="{{ config('app.name') }} logo">

		<h1 class="page-title">Databloggen</h1>
		<div class="blog-nav-links">
			<p>
				<span>Datahjelpen:</span>
				<a href="{{ route('front-page') }}#services">Tjenester</a>
				<a href="{{ route('front-page') }}#projects">Prosjekter</a>
				<a href="{{ route('contact') }}">Kontakt</a>
				<a href="{{ route('about') }}">Om oss</a>
			</p>
		</div>
	</nav> --}}
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Databloggen</h1>
			<div class="entries">
				<div class="area1">
					@foreach ($area1 as $entry)
						@include('blog.index-row')
					@endforeach
				</div>
				<div class="area2">
					@foreach ($area2 as $entry)
						@include('blog.index-row')
					@endforeach
				</div>
				<div class="area3">
					@foreach ($area3 as $entry)
						@include('blog.index-row')
					@endforeach
				</div>
			</div>
			{{ $entries->links() }}
		</div>
	</section>
@endsection
