<footer>
	{{-- <img src="{{ asset('images/search-by-algolia.svg') }}" alt="Search by Algolia" width="100"> --}}
	@yield('content-footer')

	<div>
		<p>(C) Copyright {{ Date('Y') }} - {{ config('app.name') }}</p>
	</div>

	@yield('scripts-before')
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,700" rel="stylesheet">
	<link href="https://cdn.datahjelpen.no/fonts/butler/butler-900.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}"></script>

	@yield('scripts-after')
</footer>

