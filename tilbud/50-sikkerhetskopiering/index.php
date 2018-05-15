<?php
    $html_title = '50% rabatt på sikkerhetskopiering, ut september!';

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

    require_once('../../templates/head.php');
?>
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no7/festivo_letters_no7.css">
<link rel="stylesheet" type="text/css" href="/fonts/festivo_letters/no18/festivo_letters_no18.css">
<div class="layout-square-large datahjelp-bg depth-2">
    <?php require_once('../../templates/navigation.php'); ?>
    <h1 class="font-huge font-fancy2 white-text center-align">50% rabatt på sikkerhetskopiering!</h1>
    <p class="white-text font-fancy1 center-align font-small">Har PCen din tatt kvelden? Vi henter ut dine data.</p>
    <p class="white-text center-align">Tilbudet gjelder til og med 30. september 2016</p>
    <div class="space-v-small"></div>
    <section class="white-bg content no-padding">
        <div class="grid grid-flow grey-bg">
            <div class="row">
                <div class="col s12 l6 hide-on-large-and-down">
                    <div class="bg-image white-bg" style="background-image: url('/images/graphics/tilbud/pc-syk.png')"></div>
                </div>
                <div class="col s12 l6">
                    <div class="grid-content space-v-small">
                        <div class="hide-on-large-only center-align space-v-medium">
                            <img class="avatar-large circle white-bg" src="/images/graphics/tilbud/pc-syk.png" alt="">
                        </div>
                        <p class="font-thick font-small">Orginalpris 600 ,- nå 299 ,-!</p>
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
<?php require_once('../../templates/scripts.php'); ?>
<script src="/js/bearwork/grid.js" type="text/javascript"></script>
<?php require_once('../../templates/footer.php'); ?>