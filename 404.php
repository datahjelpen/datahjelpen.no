<?php
	$body_classes = [
		'index',
		'primary',
		'black-bg'
	];
	
	require_once('templates/head.php');
?>
<style>
	html,
	body {
		height: 100%;
	}

	body {
		padding: 0 !important;
	}

	#logo {
		width: 100px;
		margin-bottom: 10px;
	}

	@media screen and (max-width: 600px) {
		.font-huge {
			font-size: 3em;
		}
	}
</style>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="row center-align">
	<div class="col s12 center-vertically">
		<img id="logo" src="/images/brand/logo/white/128.png" alt="Datahjelpen logo">
		<h1 class="font-huge font-fancy2 no-margin white-text">Error 404</h1>
		<h2 class="font-small font-fancy1 no-margin white-text">Siden finnes ikke</h2>
		<div class="space-v-small"></div>
		<a class="btn white" href="/">Gå tilbake</a>
	</div>
</div>