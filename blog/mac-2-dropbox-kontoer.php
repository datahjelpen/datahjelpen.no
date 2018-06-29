<?php
    $html_title = 'Mac OS - Hvordan ha 2 Dropbox kontoer';

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
    <div class="space-v-small"></div>
    <h1 class="font-medium font-fancy2 white-text center-align">Mac OS - Hvordan ha 2 Dropbox kontoer</h1>
    <div class="space-v-small"></div>
    <section class="white-bg content no-padding">
        <div class="grid grid-flow grey-bg">
            <div class="row">
                <div class="col s12 l6 hide-on-large-and-down">
                    <div class="bg-image white-bg" style="background-image: url('https://f.datahjelpen.no/xprfhx.jpg')"></div>
                </div>
                <div class="col s12 l6">
                    <div class="grid-content space-v-small">
                        <div class="hide-on-large-only center-align space-v-medium">
                            <img class="avatar-large circle white-bg" src="https://f.datahjelpen.no/xprfhx.jpg" alt="Dropbox">
                        </div>
                        <h3 id="metode1" class="font-fancy1 font-medium">Steg 1 - Dropbox</h3>
                        <ol>
                            <li>
                            	Sørg for å ha vanlig Dropbox installert.
                            	<ul>
                            		<li><a class="link" href="https://www.dropbox.com/install">Last ned Dropbox</a>.</li>
                            	</ul>
                            	Obs! Må være installert i hoved-programmer mappen (Mac HD > Programmer), ikke den for brukeren (Mac HD > Brukere > {brukernavn} > Programmer).
                            </li>
                            <li>Kjør Dropbox.</li>
                            <li>Logg inn på konto nr 1.</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l6">
                    <div class="grid-content space-v-small">
                        <div class="hide-on-large-only center-align space-v-medium">
                            <img class="avatar-large circle white-bg" src="https://f.datahjelpen.no/qjesx.png" alt="Dropbox Encore">
                        </div>
                        <h3 id="metode2" class="font-fancy1 font-medium">Steg 2 - Encore</h3>
                        <ol>
                            <li>Gå til <a class="link" href="http://www.joyofmacs.com/software/dropboxencore/">joyofmacs.com/software/dropboxencore</a>.</li>
                            <li>Trykk på "installation".</li>
                            <li>Trykk på "DropboxEncore1.0.dmg". Dette vil laste ned programmet.</li>
                            <li>
                            	Dobbeltrykk på den nedlastede filen.
                            	<ul>
                            		<li>Du skal nå få opp et lite vindu. Dra Dropbox ikonet over til Programmer mappen.</li>
                            	</ul>
                            </li>
                            <li>
                            	Åpne programmer mappen din, og dobbeltrykk på Dropbox Encore.
                            	<ul>
                            		<li>Trykk ok på advarselen.</li>
                            	</ul>
                            </li>
                            <li>
                            	Åpne systemvalg (Apple ikon øverst til høyre).
                            	<ul>
                            		<li>Velg Sikkerhet og Personvern.</li>
                            		<li>Ved siden av meldingen: "'Dropbox Encore' was blocked from opening because it is not from an identified developer" er det en knapp, trykk på den.</li>
                            		<li>Trykk "åpne" på meldingen som nå poppet opp.</li>
                            	</ul>
                            </li>
                            <li>Logg inn på konto nr 2.</li>
                        </ol>
                    </div>
                </div>
                <div class="col s12 l6 hide-on-large-and-down">
                    <div class="bg-image white-bg" style="background-image: url('https://f.datahjelpen.no/qjesx.png')"></div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l6 hide-on-large-and-down">
                    <div class="bg-image white-bg" style="background-image: url('https://f.datahjelpen.no/nteuit.png')"></div>
                </div>
                <div class="col s12 l6">
                    <div class="grid-content space-v-small">
                        <div class="hide-on-large-only center-align space-v-medium">
                            <img class="avatar-large circle white-bg" src="https://f.datahjelpen.no/nteuit.png" alt="Mac startup">
                        </div>
                        <h3 id="metode1" class="font-fancy1 font-medium">Steg 3 - oppstart</h3>
                        <ol>
                            <li>Åpne systemvalg (Apple ikon øverst til høyre).</li>
                            <li>Gå inn på brukerkontoer.</li>
                            <li>Velg din bruker.</li>
                            <li>Velg påloggingsobjekter.</li>
                            <li>Trykk på + ikonet</li>
                            <li>Finn frem til Dropbox Encore.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="datahjelp-bg row center-align">
        <div class="col s12 m6">
            <a href="/" class="btn white font-small subtle" title="Gå tilbake"><i class="icon-arrow-31 left"></i>Tilbake</a>
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
