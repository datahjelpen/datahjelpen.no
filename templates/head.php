<?php
	if (isset($html_title)) {
		$html_title = $html_title . ' - Datahjelpen AS';
	} else {
		$html_title = 'Datahjelpen AS';
	}
?>

<!doctype html>
<html lang="no" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=2, width=device-width, height=device-height">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?= $html_title; ?></title>
	<meta name="author" content="Datahjelpen AS">
	<meta name="description" content="Datahjelpen leverer tjenester til privat- og bedriftsmarkedet. Vi tilbyr oppsett av nettsider, generell datahjelp og en-til-en opplæring.">
	<link rel="canonical" href="https://datahjelpen.no">
	<!-- Open Graph data -->
	<meta property="og:title" content="Datahjelpen AS">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://datahjelpen.no">
	<meta property="og:image" content="https://datahjelpen.no/image.jpg">
	<meta property="og:description" content="Datahjelpen leverer tjenester til privat- og bedriftsmarkedet. Vi tilbyr oppsett av nettsider, generell datahjelp og en-til-en opplæring.">
	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@datahjelpen_no">
	<meta name="twitter:title" content="Datahjelpen AS">
	<meta name="twitter:description" content="Datahjelpen leverer tjenester til privat- og bedriftsmarkedet. Vi tilbyr oppsett av nettsider, generell datahjelp og en-til-en opplæring.">
	<meta name="twitter:creator" content="@datahjelpen_no">
	<meta name="twitter:image" content="https://datahjelpen.no/image.jpg">
	<!-- App information -->
	<link rel="manifest" href="/manifest.json">
	<meta name="application-name" content="Datahjelpen">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="#ff2014">
	<meta name="msapplication-TileColor" content="#ff2014">
	<meta name="msapplication-navbutton-color" content="#ff2014">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!-- Icons -->
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
	<link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/images/favicon-96x96.png" sizes="96x96">
	<meta name="msapplication-TileImage" content="images/app-3x.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/images/app-3x.png">
	<link rel="icon" type="image/png" href="/images/app-4x.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/images/favicon-194x194.png" sizes="194x194">
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="/css/bearwork.css">
	<link rel="stylesheet" type="text/css" href="/css/global.css">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<?php
		if (isset($extra_css)) {
			foreach ($extra_css as $stylesheet) {
				echo '<link rel="stylesheet" type="text/css" href="/css/' . $stylesheet . '.css">';
			}
		}

		if (isset($navigation_classes)) {
			$navigation_classes = implode(' ', $navigation_classes);
		} else {
			$navigation_classes = '';
		}

		if (isset($body_classes)) {
			$body_classes = implode(' ', $body_classes);
		} else {
			$body_classes = '';
		}

		if (isset($background_image)) {
			$body_classes .= ' bg-image';
			$background_image = 'style="background-image: url(' . $background_image . ')"';
		} else {
			$background_image = '';
		}
	?>
</head>
<body class="<?= $body_classes; ?>" <?= $background_image; ?>>
