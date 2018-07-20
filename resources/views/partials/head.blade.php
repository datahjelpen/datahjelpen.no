@php
	$title = ucfirst(str_replace('/', ' - ', Request::path()));

	if ($title == ' - ') {
		$title = config('app.name_legal');
	} else {
		$title .= ' | ' . config('app.name_legal');
	}
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"  prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, width=device-width, height=device-height">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ $title }}</title>
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">

	<meta name="author" content="Datahjelpen AS">
	<meta name="description" content="Vi skaper de digitale opplevelsene som folk elsker">
	<link rel="canonical" href="https://datahjelpen.no">
	<!-- Open Graph data -->
	<meta property="og:title" content="Datahjelpen AS">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://datahjelpen.no">
	<meta property="og:image" content="https://datahjelpen.no/image.jpg">
	<meta property="og:description" content="Vi skaper de digitale opplevelsene som folk elsker">
	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@datahjelpen_no">
	<meta name="twitter:title" content="Datahjelpen AS">
	<meta name="twitter:description" content="Vi skaper de digitale opplevelsene som folk elsker">
	<meta name="twitter:creator" content="@datahjelpen_no">
	<meta name="twitter:image" content="https://datahjelpen.no/image.jpg">
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
<body>
