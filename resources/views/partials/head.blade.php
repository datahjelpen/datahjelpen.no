<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"  prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=2.5, width=device-width, height=device-height">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }}</title>
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#202147">
	<meta name="theme-color" content="#ffffff">
	{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-72567544-8"></script> --}}
	<script>
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
	</script>
</head>
<body>
