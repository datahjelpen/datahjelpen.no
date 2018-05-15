<?php
	$html_title = 'Noe gikk galt';

	$extra_css = [
		'grid'
	];

	$navigation_classes = [
		'light'
	];

	$body_classes = [
		'contact-success',
		'grey-bg'
	];

	require_once('templates/head.php');
?>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large primary-bg depth-2">
	<?php require_once('templates/navigation.php'); ?>
	<h1 class="font-huge font-fancy2 center-align white-text">Noe gikk galt</h1>
	<section class="white-bg content no-padding">
		<div class="grid grid-flow grey-bg">
			<div class="row">
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/email/icon-error.png" alt="">
						</div>
						<h3 id="hjelp_med_virus" class="font-fancy1 font-medium">Meldingen ble ikke sendt</h3>
						<p>
							Du kan sende e-post til <a class="link" href="mailto:post@datahjelpen.no">post@datahjelpen.no</a>
						</p>
						<p>
							Ring oss gjerne på <a class="link" href="tel:90717232">907 17 232</a> mellom 16 og 21.
						</p>
						<div class="space-v-small"></div>
						<p class="font-thick">
							Feilmelding:
						</p>
						<p>
							<pre><?= $msg_error; ?></pre>
						</p>
						<div class="space-v-small center-align">
							<a class="btn font-small" href="/kontakt">Prøv igjen</a>
						</div>
					</div>
				</div>
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/email/icon-error.png')"></div>
				</div>
			</div>
	</section>
</div>
<?php require_once('templates/scripts.php'); ?>
<script src="/js/bearwork/grid.js" type="text/javascript"></script>
<?php require_once('templates/footer.php'); ?>