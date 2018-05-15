<?php
	$html_title = 'Om oss';

	$extra_css = [
		'grid'
	];

	$navigation_classes = [
		'light'
	];

	$body_classes = [
		'about',
		'primary',
		'grey-bg'
	];

	require_once('templates/head.php');
?>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large primary-bg depth-2">
	<?php require_once('templates/navigation.php'); ?>
	<h1 class="font-huge font-fancy2 center-align white-text">Om oss</h1>
	<section class="grey-bg grid grid-large content no-padding">
		<div class="row white-bg">
			<div class="col s12 l6">
				<div class="grid-content links">
					<div class="hide-on-large-only center-align space-v-medium">
						<img class="avatar-large circle grey-bg" src="/images/brand/logo/black/logo.png" alt="Datahjelpen Logo">
					</div>
					<h3 class="font-fancy1 font-medium">Datahjelpen</h3>
					<p>
						Firmaet Datahjelpen ble stiftet januar 2016 og ligger i Halden.
					</p>
					<p>
						Datahjelpen leverer tjenester til både privat- og bedriftsmarkedet.
						Vi tilbyr blant annet oppsett av nettsider, generell datahjelp og en-til-en opplæring.
						<a href="/tjenester">Les mer om våre tjenester</a>.
					</p>
					<p>
						Vårt mål er å gi våre kunder en enklere IT-hverdag på en effektiv måte, til en fornuftig pris.
					</p>
					<p>
						Ved vedlikehold av din datamaskin kan du leveres den til oss, eventuelt kan vi også være
						behjelpelige med henting. For nærmere informasjon, <a href="/kontakt">ta kontakt</a>.
					</p>
				</div>
			</div>
			<div class="col s12 l6 right hide-on-large-and-down">
				<div class="bg-image" style="background-image: url('/images/brand/logo/black/logo2x.png')"></div>
			</div>
		</div>
		<div id="mer" class="clear"></div>
		<div id="line_sharina_hagen" class="row">
			<div class="col s12 l6 hide-on-large-and-down">
				<div class="bg-image" style="background-image: url('/images/company/employees/line_sharina_aamodt.jpg')"></div>
			</div>
			<div class="col s12 l6">
				<div class="grid-content">
					<div class="hide-on-large-only center-align space-v-medium">
						<img class="avatar-large circle" src="/images/company/employees/line_sharina_aamodt.jpg" alt="">
					</div>
					<h3 class="font-fancy1 font-medium">Line Sharina Hagen</h3>
					<h4>Daglig leder</h4>
					<p>
						Line har hovedsakelig jobbet i Vestfold Fylkeskommune som helpdesk der hun har supportert både ansatte og elever
						med deres dataproblemer.
						Hun har rullert mellom forskjellige lokasjoner, og har derfor erfaring fra flere videregående skoler i Vestfold.
					</p>
					<h4>Kontakt</h4>
					<ul class="links">
						<li><i class="icon-mail-1"></i> <a href="mailto:line@datahjelpen.no">line@datahjelpen.no</a></li>
						<li><i class="icon-smartphone-1"></i> <a href="tel:90717232">907 17 232</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="hide-on-large-only space-a-small"></div>
		<div id="bjornar_hagen" class="row white-bg">
			<div class="col s12 l6">
				<div class="grid-content">
					<div class="hide-on-large-only center-align space-v-medium">
						<img class="avatar-large circle" src="/images/company/employees/bjornar_hagen.jpg" alt="">
					</div>
					<h3 class="font-fancy1 font-medium">Bjørnar Hagen</h3>
					<h4>Webdesigner og utvikler</h4>
					<p>
						Bjørnar er webdesigner og har erfaring fra privatmarkedet, bl.a. fra Optimale Systemer AS i Larvik.
						Webdesign er hans kjernekompetanse, og han har erfaring med programmeringsspråk som HTML, CSS, og PHP.
					</p>
					<h4>Kontakt</h4>
					<ul class="links">
						<li><i class="icon-mail-1"></i> <a href="mailto:bjornar@datahjelpen.no">bjornar@datahjelpen.no</a></li>
						<li><i class="icon-smartphone-1"></i> <a href="tel:41558490">415 58 490</a></li>
					</ul>
				</div>
			</div>
			<div class="col s12 l6 right hide-on-large-and-down">
				<div class="bg-image" style="background-image: url('/images/company/employees/bjornar_hagen.jpg')"></div>
			</div>
		</div>
	</section>
	<section class="primary-bg row center-align">
		<div class="col s12">
			<a href="/kontakt" class="btn white font-small" title="Ta kontakt med oss, så hjelper vi deg!">Kontakt oss <i class="icon-mail-1 right"></i></a>
		</div>
	</section>
</div>
<?php require_once('templates/scripts.php'); ?>
<?php require_once('templates/footer.php'); ?>