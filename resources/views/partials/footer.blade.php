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
				<div class="footer-links-social">
					<a href="https://fb.com/datahjelpen.no"><i class="icon" data-feather="facebook"></i></a>
					<a href="https://instagr.am/datahjelpen.no"><i class="icon" data-feather="instagram"></i></a>
					<a href="https://twitter.com/datahjelpen_no"><i class="icon" data-feather="twitter"></i></a>
					<a href="https://www.linkedin.com/company/datahjelpen"><i class="icon" data-feather="linkedin"></i></a>
					<a href="https://github.com/datahjelpen"><i class="icon" data-feather="github"></i></a>
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
	<script>
		(function() {
			var messages = false;
			@foreach (['error', 'warning', 'success', 'info'] as $msg)
				@if (Session::has($msg))
					messages = true;
				@endif
			@endforeach
			@if (isset($errors) && count($errors))
				messages = true;
			@endif

			if (messages) {
				var messagesWrapper = document.querySelector('#flash-message');
				messages = messagesWrapper.querySelectorAll('li');

				for (var i = 0; i < messages.length; i++) {
					messages[i].addEventListener('click', function() {
						var message = this;
						message.classList.add('hide');

						setTimeout(function() {
							message.classList.add('hidden');
						}, 250);
					});
				}

				setTimeout(function() {
					for (var i = 0; i < messages.length; i++) {
						hideMessage(messages[i], i);
					}
				}, 5000);
			}

			function hideMessage(message, timeout) {
				var timeout = timeout*250;
				setTimeout(function() {
					message.classList.add('hide');
				}, timeout);

				setTimeout(function() {
					message.classList.add('hidden');
				}, timeout+250);
			}
		})();
	</script>
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,700" rel="stylesheet">
	<link href="https://cdn.datahjelpen.no/fonts/butler/butler-900.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:400" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}"></script>

	@yield('scripts-after')
</footer>

