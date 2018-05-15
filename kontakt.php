<?php
	$html_title = 'Kontakt';

	$navigation_classes = [
		'light'
	];

	$body_classes = [
		'contact',
		'primary',
		'grey-bg'
	];

	require_once('templates/head.php');
?>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large primary-bg depth-2">
	<?php require_once('templates/navigation.php'); ?>
	<h1 class="font-huge font-fancy2 center-align white-text">Kontakt oss</h1>
	<section class="white-bg content">
		<div class="row">
			<div class="col s12 l5">
				<ul class="no-margin links">
					<li>Åpningstider 09-17</li>
					<li><i class="icon-mail-1"></i> <a href="mailto:post@datahjelpen.no">post@datahjelpen.no</a></li>
					<li><i class="icon-smartphone-1"></i> <a href="tel:46531170">465 31 170</a></li>
					<li><a href="https://fb.me/datahjelpen.no">Facebook</a></li>
					<li><a href="https://instagr.am/datahjelpen.no">Instagram</a></li>
					<li><a href="https://plus.google.com/u/0/b/116790035984122179873/116790035984122179873">Google +</a></li>
				</ul>
				<div class="space-v-small">
					<?php require_once('templates/form-contact.html'); ?>
				</div>
			</div>
			<div class="col s12 hide-on-large-only space-v-small"></div>
			<div class="col s12 l6 right">
				<div class="row">
					<div class="col s12 m8">
						<p>Grimsrødveien 6, 1786 Halden</p>
					</div>
					<div class="col s12 m4 right-align">
						<a href="https://www.google.com/maps/place/Grimsrødveien+6,+1786+Halden,+Norge/@59.1504541,10.20889,17z/data=!3m1!4b1!4m2!3m1!1s0x4646c0c7cb7e7a6f:0xe566760b2fe7dd9f?hl=no" class="link">Åpne kart</a>
					</div>
				</div>
				<div class="space-v-small">
					<div id="contact-map"></div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php require_once('templates/scripts.php'); ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdohHltsDEA8KGMQbuttlBkLhVrgJ4Ggc"></script>
<script type="text/javascript" src="/js/customMap.js"></script>
<?php require_once('templates/footer.php'); ?>
