<footer>
	{{-- <img src="{{ asset('images/search-by-algolia.svg') }}" alt="Search by Algolia" width="100"> --}}
	@yield('content-footer')

	<div id="footer-content">
		@auth
			<section>
				<div>
					<div class="footer-links-authed">
						@role('author')
							<a href="{{ route('blog.dashboard') }}"><i class="icon" data-feather="edit"></i><span>Blog dashboard</span></a>
						@endrole
						<a href="{{ route('user') }}"><i class="icon" data-feather="user"></i><span>Konto</span></a>
						{{-- <a href="{{ route('dashboard') }}"><i class="icon" data-feather="layout"></i><span>Kontrollpanel</span></a> --}}
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="icon" data-feather="log-out"></i><span>Logout</span>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</div>
				</div>
			</section>
		@endauth
		<section>
			<div>
				<div class="footer-links-1">
					<a href="https://datahjelpen.no/tjenester">Tjenester</a>
					<a href="https://datahjelpen.no/kundecaser">Prosjekter</a>
					<a href="https://datahjelpen.no/kontakt">Kontakt</a>
					<a href="https://datahjelpen.no/om-oss">Om oss</a>
					<a href="https://datahjelpen.no/blogg">Blogg</a>
				</div>
				<div class="footer-links-2">
					<a href="{{ route('privacy') }}">Personvern{{--  & sikkerhet --}}</a>
					{{-- <a href="{{ route('privacy.cookies') }}">Informasjonskaplser</a> --}}
					@auth
					@else
						<a href="{{ route('login') }}">Kundelogin</a>
					@endauth
				</div>
				<div class="footer-links-social">
					<a href="https://fb.com/datahjelpen.no"><i class="icon" data-feather="facebook"></i></a>
					<a href="https://instagr.am/datahjelpen.no"><i class="icon" data-feather="instagram"></i></a>
					<a href="https://twitter.com/datahjelpen_no"><i class="icon" data-feather="twitter"></i></a>
					<a href="https://www.linkedin.com/company/datahjelpen"><i class="icon" data-feather="linkedin"></i></a>
					<a href="https://github.com/datahjelpen"><i class="icon" data-feather="github"></i></a>
				</div>
				<div class="footer-extra-info">
					<p>Org nr: {{ config('app.company_nr') }}</p>
				</div>
			</div>
			<div>
				<div class="footer-contact">
					<p><strong>Kontakt</strong></p>
					<p><span>E-post: </span><a href="mailto:post@datahjelpen.no">post@datahjelpen.no</a></p>
					<p><span>Telefon:</span><a href="tlf:46531170">465 31 170</a></p>
				</div>
			</div>
			<div>
				<div class="footer-location">
					<p><strong>Halden</strong></p>
					<p>Grimsrødveien 6,</p>
					<p>1786 Halden</p>
				</div>
			</div>
		</section>
		<section>
			<div class="footer-copyright">
				<p>© Copyright 2016-{{ Date('Y') }} - {{ config('app.name_legal') }}</p>
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
				}, 15000);
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

