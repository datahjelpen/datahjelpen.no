<?php
    $html_title = 'windows 10 slett midlertidige filer';

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
    <h1 class="font-medium font-fancy2 white-text center-align">Windows 10 - Sletting av midlertidige filer</h1>
    <div class="space-v-small"></div>
    <section class="white-bg content no-padding">
        <div class="grid grid-flow grey-bg">
            <div class="row">
                <div class="col s12 l6 hide-on-large-and-down">
                    <div class="bg-image white-bg" style="background-image: url('https://f.datahjelpen.no/mbaxh.png')"></div>
                </div>
                <div class="col s12 l6">
                    <div class="grid-content space-v-small">
                        <div class="hide-on-large-only center-align space-v-medium">
                            <img class="avatar-large circle white-bg" src="https://f.datahjelpen.no/mbaxh.png" alt="">
                        </div>
                        <h3 id="metode1" class="font-fancy1 font-medium">Metode 1</h3>
                        <ol>
                            <li>Trykk Windows knapp + I</li>
                            <li>Gå inn på system</li>
                            <li>Velg lagring</li>
                            <li>Trykk på C: disken</li>
                            <li>Trykk på midlertidig filer</li>
                            <li>Huk av alle og trykk slett</li>
                        </ol>
                        <p>Om dette ikke funker og den bare henger, se metode 2.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l6">
                    <div class="grid-content space-v-small">
                        <div class="hide-on-large-only center-align space-v-medium">
                            <img class="avatar-large circle white-bg" src="https://f.datahjelpen.no/moaszq.png" alt="">
                        </div>
                        <h3 id="metode2" class="font-fancy1 font-medium">Metode 2</h3>
                        <ol>
                            <li>Trykk Windows knapp + E</li>
                            <li>Trykk CTRL+L og skriv inn: <br><code>%WINDIR%\SoftwareDistribution\Download</code></li>
                            <li>Slett alt inne i denne mappen</li>
                        </ol>
                        <p>Ettersom sletting på vanlig måte kan henge seg opp, bruker vi en kommando for dette.</p>
                        <ol>
                            <li>Trykk Windows knapp + R</li>
                            <li>Skriv inn CMD i det vindu som popper opp, og trykk ok</li>
                            <li>Skriv inn <br><code>del C:\Windows\SoftwareDistribution\Download\*.* /s /q</code></li>
                        </ol>
                    </div>
                </div>
                <div class="col s12 l6 hide-on-large-and-down">
                    <div class="bg-image white-bg" style="background-image: url('https://f.datahjelpen.no/moaszq.png')"></div>
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