<?php
	$html_title = 'Opplæring - Tjenester';

	$extra_css = [
		'grid'
	];

	$navigation_classes = [
		'light'
	];

	$body_classes = [
		'services-opplaring',
		'grey-bg'
	];

	require_once('../templates/head.php');
?>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large opplaring-bg depth-2">
	<?php require_once('../templates/navigation.php'); ?>
	<h1 class="font-huge font-fancy2 white-text center-align">Opplæring</h1>
	<section class="white-bg content no-padding">
		<div class="grid grid-flow grey-bg">
			<div class="row">
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/opplaring-icon.png" alt="">
						</div>
						<p>
							Vi tilbyr en-til-en opplæring. Opplæringen vil være tilpasset deg og dine behov.
							Vi kan hjelpe deg med alt fra:
						</p>
						<ul class="bullets">
							<li>Grunnleggende PC</li>
							<li>Windows 7/8/10</li>
							<li>Office pakken</li>
							<li>Sosiale medier</li>
						</ul>
						<p>
							... og mye mer!
						</p>
					</div>
				</div>
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/opplaring-icon.png')"></div>
				</div>
			</div>
	</section>
	<section class="opplaring-bg row center-align">
		<div class="col s12 m6">
			<a href="./" class="btn white font-small subtle" title="Gå tilbake til tjenester oversikt"><i class="icon-arrow-31 left"></i>Tilbake</a>
		</div>
		<div class="col s12 space-v-small hide-on-medium-and-up"></div>
		<div class="col s12 m6 right">
			<a href="/kontakt" class="btn white font-small" title="Ta kontakt med oss, så hjelper vi deg!">Kontakt oss <i class="icon-mail-1 right"></i></a>
		</div>
	</section>
</div>
<?php require_once('../templates/scripts.php'); ?>
<script src="/js/bearwork/grid.js" type="text/javascript"></script>
<?php require_once('../templates/footer.php'); ?>