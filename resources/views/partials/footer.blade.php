<footer>
	{{-- <img src="{{ asset('images/search-by-algolia.svg') }}" alt="Search by Algolia" width="100"> --}}
	@yield('content-footer')

	<div>
		<p>(C) Copyright {{ Date('Y') }} - {{ config('app.name') }}</p>
	</div>

	@yield('scripts-before')
	<script src="{{ asset('js/app.js') }}"></script>

	@yield('scripts-after')
</footer>

