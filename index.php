<?php
	$extra_css = [
		'index'
	];

	$navigation_classes = [
		'light'
	];

	$body_classes = [
		'index',
		'grey-bg'
	];

	require_once('templates/head.php');
?>
<link rel="canonical" href="https://datahjelpen.no">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large white-bg depth-2">
	<section id="intro-header" class="bg-image space-a-small" style="background-image: url('/images/graphics/header_bg.jpg')">
		<?php require_once('templates/navigation.php'); ?>
		<div class="header-content center-align">
			<div class="space-v-large"></div>
			<img id="heading" src="images/graphics/heading_dataproblemer.png" alt="Dataproblemer?">
			<a id="btn-contact" href="/kontakt" class="btn font-small">Kontakt oss</a>
			<div class="space-v-large"></div>
		</div>
	</section>
	<section class="white-bg content">
		<div class="row">
			<h2 class="font-fancy1 font-medium"><a href="/om">Om oss</a></h2>
			<div class="col s12 l6 links">
				<p>
					Datahjelpen AS leverer tjenester til både privat- og bedriftsmarkedet.
					Vi tilbyr blant annet oppsett av nettsider, generell datahjelp og en-til-en opplæring.
					<a href="/tjenester">Les mer om våre tjenester</a>.
				</p>
				<p>
					Vårt mål er å gi våre kunder en enklere IT-hverdag på en effektiv måte, til en fornuftig pris.
				</p>
				<p>
					Ved vedlikehold av din datamaskin kan du leveres den til oss, eventuelt kan vi også være behjelpelige
					med henting. For nærmere informasjon, <a href="/kontakt">ta kontakt</a>.
				</p>
			</div>
			<div class="col s12 l5 right center-align">
				<div class="hide-on-large-only space-v-small"></div>
				<img class="logo" src="/images/brand/logo/black/512.png" alt="Datahjelpen Logo">
				<div class="space-v-small"></div>
				<a href="/om#mer" class="btn font-small">Les mer</a>
			</div>
		</div>
	</section>
	<section id="services" class="grey-bg content">
		<h2 class="font-fancy1 font-medium center-align"><a href="/tjenester">Tjenester</a></h2>
		<div class="row space-v-small center-align">
			<div class="col s12 m4">
				<ul>
					<li><h3 id="datahjelp" class="font-fancy1 font-small center-align"><a href="/tjenester/datahjelp">DATAHJELP</a></h3></li>
					<li><a href="./tjenester/datahjelp#sikkerhetskopiering">Sikkerhetskopiering</a></li>
					<li><a href="./tjenester/datahjelp#hjelp_med_virus">Hjelp med virus</a></li>
					<li><a href="./tjenester/datahjelp#windows_oppsett">Windows oppsett</a></li>
					<li><a href="./tjenester/datahjelp#feilsøking">Feilsøking</a></li>
				</ul>
			</div>
			<div class="col s12 m4">
				<ul>
					<li><h3 id="opplaring" class="font-fancy1 font-small center-align"><a href="/tjenester/opplaring">OPPLÆRING</a></h3></li>
					<li><a href="./tjenester/opplaring#grunnleggende_pc">Grunnleggende PC</a></li>
					<li><a href="./tjenester/opplaring#windows_7_8_10">Windows 7/8/10</a></li>
					<li><a href="./tjenester/opplaring#office_pakken">Office pakken</a></li>
					<li><a href="./tjenester/opplaring#sosiale_medier">Sosiale medier</a></li>
				</ul>
			</div>
			<div class="col s12 m4">
				<ul>
					<li><h3 id="web_design" class="font-fancy1 font-small center-align"><a href="/tjenester/web_design">WEB DESIGN</a></h3></li>
					<li><a href="./tjenester/web_design#enkle_nettsider">Enkle nettsider</a></li>
					<li><a href="./tjenester/web_design#nettbutikk">Oppsett av nettbutikk</a></li>
					<li><a href="./tjenester/web_design#webhotell">Webhotell</a></li>
					<li><a href="./tjenester/web_design#design_radgivning">Designrådgivning</a></li>
				</ul>
			</div>
		</div>
		<div class="row space-v-small">
			<div class="col s12 center-align">
				<a href="/tjenester" class="btn font-small">Les mer</a>
			</div>
		</div>
	</section>
	<section class="white-bg content">
		<div class="row">
			<h2 class="font-fancy1 font-medium"><a href="/kontakt">Kontakt oss</a></h2>
			<div class="col s12 l6">
				<?php require_once('templates/form-contact.html'); ?>
			</div>
			<div class="col s12 l5 right">
				<div class="hide-on-large-only space-v-small"></div>
				<ul class="links">
					<li>Åpningstider 09-17</li>
					<li><i class="icon-mail-1"></i> <a href="mailto:post@datahjelpen.no">post@datahjelpen.no</a></li>
					<li><i class="icon-smartphone-1"></i> <a href="tel:46531170">465 31 170</a></li>
					<li><a href="https://fb.me/datahjelpen.no">Facebook</a></li>
					<li><a href="https://instagr.am/datahjelpen.no">Instagram</a></li>
					<li><a href="https://google.com/+DatahjelpenOrg">Google +</a></li>
				</ul>
			</div>
		</div>
	</section>
	<section class="no-padding grey-bg">
		<a title="Åpne kart i Google Maps" target="_blank" href="https://www.google.no/maps/place/Grimsrødveien+6,+1786+Halden/@59.1246744,11.383455,15.75z/data=!4m5!3m4!1s0x464412c4858c0117:0xc707cab99fb1b786!8m2!3d59.1247165!4d11.3897133">
			<img src="/images/graphics/map.png" alt="Kart">
		</a>
	</section>
</div>
<?php require_once('templates/footer.php'); ?>
