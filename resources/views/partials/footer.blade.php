<footer>
	{{-- <img src="{{ asset('images/search-by-algolia.svg') }}" alt="Search by Algolia" width="100"> --}}
	@yield('content-footer')

	<div id="footer-content">
		<section>
			<div>
				<div class="footer-links-1">
					<a href="{{ route('front-page') }}#services">Tjenester</a>
					<a href="{{ route('front-page') }}#projects">Prosjekter</a>
					<a href="{{ route('contact') }}">Kontakt</a>
					<a href="{{ route('about') }}">Om oss</a>
				</div>
				<div class="footer-links-2">
					<a href="{{ route('privacy') }}">Personvern</a>
				</div>
				<div class="footer-extra-info">
					<p>Org nr: 917 406 626</p>
				</div>
			</div>
			<div>
				<div class="footer-location">
					<p><strong>Sandefjord</strong></p>
					<p>Søndre kullerød 2,</p>
					<p>3241 Sandefjord</p>
				</div>
				<div class="footer-contact">
					<p><strong>Kontakt</strong></p>
					<p><span>E-post: </span><a href="mailto:post@datahjelpen.no">post@datahjelpen.no</a></p>
					<p><span>Telefon:</span><a href="tlf:46531170">465 31 170</a></p>
				</div>
			</div>
		</section>
		<section>
			<div class="footer-copyright">
				<p>© Copyright {{ Date('Y') }} - {{ config('app.name') }}</p>
			</div>
		</section>
	</div>

	@yield('scripts-before')
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,700" rel="stylesheet">
	<link href="https://cdn.datahjelpen.no/fonts/butler/butler-900.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}"></script>

	@yield('scripts-after')
</footer>

