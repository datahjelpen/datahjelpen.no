<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"  prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="utf-8">

	@hasSection('content-head-meta-title')
		@yield('content-head-meta-title')
	@else
		@php
			$title = ucfirst(str_replace('/', ' - ', Request::path()));

			if ($title == ' - ') {
				$title = config('app.name_legal');
			} else {
				$title .= ' | ' . config('app.name_legal');
			}
		@endphp
		@include('partials.head-meta-title', ['title' => $title])
	@endif

	@hasSection('content-head-meta-description')
		@yield('content-head-meta-description')
	@else
		@include('partials.head-meta-description', ['description' => config('app.description')])
	@endif

	@hasSection('content-head-meta-image')
		@yield('content-head-meta-image')
	@else
		@include('partials.head-meta-image', ['image' => asset(config('app.image'))])
	@endif

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, width=device-width, height=device-height">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">

	<meta name="author" content="Datahjelpen AS">

	@hasSection('content-head-meta-og_url_type')
		@yield('content-head-meta-og_url_type')
	@else
		@include('partials.head-meta-og_url_type', ['url' => Request::url(), 'type' => 'website'])
	@endif

	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@datahjelpen_no">
	<meta name="twitter:creator" content="@datahjelpen_no">
	<!-- App information -->
	<link rel="manifest" href="/site.webmanifest">
	<meta name="application-name" content="Datahjelpen AS">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="#ff2014">
	<meta name="msapplication-TileColor" content="#ff2014">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ff2014">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400" rel="stylesheet">
	<link href="https://cdn.datahjelpen.no/fonts/butler/butler-700.css" rel="stylesheet">
	@yield('content-head-meta-extra')
	{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-72567544-8"></script> --}}
{{-- 	<script>
		window.dnt = false;
		window.cookieConsent = false;

		if (navigator.doNotTrack == "yes" || navigator.doNotTrack == "1" || navigator.msDoNotTrack == "1") window.dnt = true;

		// Respect Do Not Track
		if (!window.dnt && window.cookieConsent) {
			setupCookies();
		}

		function setupCookies() {
			// Setup Google Analytics
			(function() {
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				gtag('config', 'UA-72567544-8');
			})();
		}
	</script> --}}
</head>
