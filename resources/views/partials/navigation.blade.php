<nav id="main-navigation">
	<ul class="main-navigation-brand">
		<li>
			<a href="{{ route('front-page') }}">
				<img src="/images/logo/logo-only/g_p.svg" alt="{{ config('app.name') }} logo">
			</a>
		</li>
	</ul>
	<ul class="main-navigation-links">
		<li><a href="{{ route('services') }}">Tjenester</a></li>
		<li><a href="{{ route('references') }}">Referanser</a></li>
		<li><a href="{{ route('contact') }}">Kontakt</a></li>
		<li><a href="{{ route('about') }}">Om oss</a></li>
	</ul>
</nav>
<nav>
	{{ Breadcrumbs::render() }}
</nav>
