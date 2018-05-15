<?php
	$html_title = 'Melding sendt';

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
	<h1 class="font-huge font-fancy2 center-align white-text">Suksess!</h1>

	<section class="white-bg content no-padding">
		<div class="grid grid-flow grey-bg">
			<div class="row">
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/email/icon-sent.png" alt="">
						</div>
						<h3 id="hjelp_med_virus" class="font-fancy1 font-medium">Din melding ble sendt</h3>
						<p>
							Vi svarer så fort vi har mulighet!
						</p>
						<p>
							Ring oss gjerne på <a class="link" href="tel:41558490">415 58 490</a> mellom 16 og 21.
						</p>
						<div class="space-v-small"></div>
						<p class="font-thick">
							Sjekk oss ut på sosiale medier!
						</p>
						<ul class="links">
							<li><a href="https://fb.me/datahjelpen.no">Facebook</a></li>
							<li><a href="https://instagr.am/datahjelpen.no">Instagram</a></li>
							<li><a href="https://google.com/+DatahjelpenOrg">Google +</a></li>
						</ul>
						<div class="space-v-medium center-align">
							<a href="/" class="btn font-small">Til forsiden <i class="icon-arrow-32 right"></i></a>
						</div>
					</div>
				</div>
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/email/icon-sent.png')"></div>
				</div>
			</div>
	</section>
</div>
<?php require_once('templates/scripts.php'); ?>
<script src="/js/bearwork/grid.js" type="text/javascript"></script>
<?php require_once('templates/footer.php'); ?>