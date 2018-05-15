<?php
	$html_title = 'Web Design - Tjenester';

	$extra_css = [
		'grid'
	];

	$navigation_classes = [
		'light'
	];

	$body_classes = [
		'services',
		'grey-bg'
	];

	require_once('../templates/head.php');
?>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large web_design-bg depth-2">
	<?php require_once('../templates/navigation.php'); ?>
	<h1 class="font-huge font-fancy2 white-text center-align">Webdesign</h1>
	<section class="white-bg content no-padding">
		<div class="grid grid-flow grey-bg">
			<div class="row">
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/web_design-enkle_nettsider.png')"></div>
				</div>
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/web_design-enkle_nettsider.png" alt="">
						</div>
						<h3 id="enkle_nettsider" class="font-fancy1 font-medium">Nettsider</h3>
						<p>
							Hvis du er på jakt etter en ny nettside, kan vi skreddersy en pen, rask og rimelig
							nettside for deg. Nettsiden din vil tilpasse seg alle størrelser, slik at den ser like bra
							ut på mobilen og nettbrettet, som på PC-skjermen.
						</p>
						<p>
							Hvis ønskelig kan vi også sette opp et system, der du selv kan logge deg inn og endre på innhold.
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/web_design-nettbutikk.png" alt="">
						</div>
						<h3 id="nettbutikk" class="font-fancy1 font-medium">Oppsett av nettbutikk</h3>
						<p>
							Har du lyst på din egen nettbutikk? Vi kan sette opp dette for deg.
						</p>
						<p>
							Vårt system lar deg samarbeide med andre nettsider og bloggere. Da kan du for eksempel gi ut
							en lenke til en partner og få en oversikt over hvor mange kjøp som er blitt gjort gjennom
							akkurat den lenken.
						</p>
						<p>
							Du vil også ha muligheten til å logge inn og legge til/endre produkter på en enkel og
							intuitiv måte.
						</p>
					</div>
				</div>
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/web_design-nettbutikk.png')"></div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/web_design-hosting_nettsider.png')"></div>
				</div>
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/web_design-hosting_nettsider.png" alt="">
						</div>
						<h3 id="webhotell" class="font-fancy1 font-medium">Webhotell</h3>
						<p>
							Datahjelpen sørger for at din nettside er rask og tilgjengelig 24/7 over hele verden.
						</p>
						<p>
							Våre systemer overvåker dine nettsider og passer på at alt er oppe. Derfor kan vi garantere
							<span class="font-thick">mer enn 99 % oppetid</span>, på dine nettsider. Klarer vi ikke dette,
							får du pengene tilbake. 
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 l6">
					<div class="grid-content space-v-small">
						<div class="hide-on-large-only center-align space-v-medium">
							<img class="avatar-large circle white-bg" src="/images/graphics/services/web_design-design_radgivning.png" alt="">
						</div>
						<h3 id="design_radgivning" class="font-fancy1 font-medium">Designrådgivning</h3>
						<p>
							Har du laget en nettside, plakat, brosjyre eller lignende, men trenger nye synspunkter,
							råd og veiledning?
						</p>
						<p>
							Vi kan komme med råd og hjelpe deg med tekst, farge- og bildebruk.
						</p>
					</div>
				</div>
				<div class="col s12 l6 hide-on-large-and-down">
					<div class="bg-image white-bg" style="background-image: url('/images/graphics/services/web_design-design_radgivning.png')"></div>
				</div>
			</div>
		</div>
	</section>
	<section class="web_design-bg row center-align">
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