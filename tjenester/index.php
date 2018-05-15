<?php
	$html_title = 'Tjenester';

	$extra_css = [
		'services'
	];

	$navigation_classes = [
		'light'
	];

	$body_classes = [
		'services',
		'primary',
		'grey-bg'
	];

	require_once('../templates/head.php');
?>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large primary-bg depth-2">
	<?php require_once('../templates/navigation.php'); ?>
	<h1 class="font-huge font-fancy2 white-text center-align">Les mer om ...</h1>
	<section class="white-bg">
		<div id="select-category" class="row">
			<a href="./datahjelp" class="col s12 l4 white-text">
				<div class="category space-a-small bg-image" style="background-image: url('/images/graphics/services/datahjelp.jpg');">
					<div class="row">
						<div class="col s12 m6 l12">
							<h2>Datahjelp</h2>
						</div>
						<div class="col s12 m6 l12">
							<ul>
								<li>Sikkerhetskopiering</li>
								<li>Hjelp med virus</li>
								<li>Windows oppsett</li>
								<li>Feilsøking</li>
							</ul>
						</div>
					</div>
				</div>
			</a>
			<a href="./opplaring" class="col s12 l4 white-text">
				<div class="category space-a-small bg-image" style="background-image: url('/images/graphics/services/opplaring.jpg');">
					<div class="row">
						<div class="col s12 m6 l12">
							<h2>Opplæring</h2>
						</div>
						<div class="col s12 m6 l12">
							<ul>
								<li>Grunnleggende PC</li>
								<li>Windows 7/8/10</li>
								<li>Office pakken</li>
								<li>Sosiale medier</li>
							</ul>
						</div>
					</div>
				</div>
			</a>
			<a href="./web_design" class="col s12 l4 white-text">
				<div class="category space-a-small bg-image" style="background-image: url('/images/graphics/services/web_design.jpg');">
					<div class="row">
						<div class="col s12 m6 l12">
							<h2>Webdesign</h2>
						</div>
						<div class="col s12 m6 l12">
							<ul>
								<li>Enkle nettsider</li>
								<li>Oppsett av nettbutikk</li>
								<li>Webhotell</li>
								<li>Designrådgivning</li>
							</ul>
						</div>
					</div>
				</div>
			</a>
		</div>
	</section>
</div>
<?php require_once('../templates/scripts.php'); ?>
<script src="/js/bearwork/grid.js" type="text/javascript"></script>
<?php require_once('../templates/footer.php'); ?>