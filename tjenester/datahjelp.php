<?php
	$html_title = 'Datahjelp - Tjenester';

	$extra_css = [
		'grid'
	];

	$navigation_classes = [
		'light'
	];

	$body_classes = [
		'services-datahjelp',
		'grey-bg'
	];

	require_once('../templates/head.php');
?>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large datahjelp-bg depth-2">
	<?php require_once('../templates/navigation.php'); ?>
	<h1 class="font-huge font-fancy2 white-text center-align">Datahjelp</h1>
	<section class="white-bg content no-padding">
		<div class="grid grid-flow grey-bg">
			<div class="row">
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/datahjelp-sikkerhetskopiering.png')"></div>
				</div>
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/datahjelp-sikkerhetskopiering.png" alt="">
						</div>
						<h3 id="sikkerhetskopiering" class="font-fancy1 font-medium">Sikkerhetskopiering</h3>
						<p>
							Det er viktig å ha sikkerhetskopi av din datamaskinen i tilfelle noe skulle gå galt.
							Sikkerhetskopier sikrer at du ikke mister viktige filer, dokumenter og bilder. Vi kan bistå
							deg med sikkerhetskopiering fra din PC til en ekstern harddisk eller en sky-løsning.
						</p>
						<p class="font-thick">
							Ekstern harddisk
						</p>
						<p>
							Datamaskinens innhold sikkerhetskopieres fra din datamaskin til en ekstern harddisk. </br>
							(Pris på ekstern harddisk kommer i tillegg.)
						</p>
						<p class="font-thick">
							Sky-løsning
						</p>
						<p>
							Datamaskinens innhold sikkerhetskopieres trygt til skyen. Da vil dine data alltid være
							tilgjengelig, uavhengig av hvor du er og hvilken enhet du er på.
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/datahjelp-hjelp_med_virus.png" alt="">
						</div>
						<h3 id="hjelp_med_virus" class="font-fancy1 font-medium">Hjelp med virus</h3>
						<p>
							Det er fort gjort å ende opp med virus. Vi hjelper deg hvis du har vært uheldig. Da skanner
							vi PCen din og blir kvitt virus og skadevare. Noen ganger er det lureste å formatere
							datamaskinen, for å være sikre på at viruset er fjernet for godt.
						</p>
					</div>
				</div>
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/datahjelp-hjelp_med_virus.png')"></div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/datahjelp-windows_oppsett.png')"></div>
				</div>
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/datahjelp-windows_oppsett.png" alt="">
						</div>
						<h3 id="windows_oppsett" class="font-fancy1 font-medium">Windows oppsett</h3>
						<p>
							Vi kan sette opp din datamaskin og installere operativsystem, slik at den er klar til bruk.
						</p>
						<p>
							Ved formatering tar vi først en sikkerhetskopi av dine data. Deretter legger vi inn ditt
							operativsystem på nytt, slik at datamaskinen blir som da du fikk den.
						</p>
						<p>
							Vi kan også oppgradere ditt operativsystem, f.eks. fra Windows 7 til Windows 10.
						</p>
						<p>
							Hvis du allerede har en gyldig Windows-lisens, bruker vi denne på nytt. Hvis ikke kan vi
							være behjelpelige med å skaffe en ny. 
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/datahjelp-feilsoking.png" alt="">
						</div>
						<div class="space-v-small"></div>
						<h3 id="feilsøking" class="font-fancy1 font-medium">Feilsøking</h3>
						<p>
							Ikke helt sikker på hva som er galt med din PC? Vi hjelper deg med å finne problemet!
						</p>
						<div class="space-v-small"></div>
					</div>
				</div>
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/datahjelp-feilsoking.png')"></div>
				</div>
			</div>
		</div>
	</section>
	<section class="datahjelp-bg row center-align">
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