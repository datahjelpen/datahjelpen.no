@extends('partials.master')
@section('content-main')
	<header class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Mac OS - Hvordan ha 2 Dropbox kontoer</h1>
			<div class="content-text">
				<h2>Steg 1 - Dropbox</h2>
				<ol>
					<li>
						Sørg for å ha vanlig Dropbox installert.<br>
						Last ned Dropbox.<br>
						Obs! Må være installert i hoved-programmer mappen (Mac HD > Programmer), ikke den for brukeren (Mac HD > Brukere > {brukernavn} > Programmer).
					</li>
					<li>Kjør Dropbox.</li>
					<li>Logg inn på konto nr 1.</li>
				</ol>
				<img src="https://f.datahjelpen.no/xprfhx.jpg" alt="Dropbox logo">

				<h2>Steg 2 - Encore</h2>
				<ol>
					<li>Gå til joyofmacs.com/software/dropboxencore.</li>
					<li>Trykk på "installation".</li>
					<li>Trykk på "DropboxEncore1.0.dmg". Dette vil laste ned programmet.</li>
					<li>
						Dobbeltrykk på den nedlastede filen.<br>
						Du skal nå få opp et lite vindu. Dra Dropbox ikonet over til Programmer mappen.
					</li>
					<li>
						Åpne programmer mappen din, og dobbeltrykk på Dropbox Encore.<br>
						Trykk ok på advarselen.
					</li>
					<li>
						Åpne systemvalg (Apple ikon øverst til høyre).<br>
						Velg Sikkerhet og Personvern.<br>
						Ved siden av meldingen: "'Dropbox Encore' was blocked from opening because it is not from an identified developer" er det en knapp, trykk på den.<br>
						Trykk "åpne" på meldingen som nå poppet opp.
					</li>
					<li>Logg inn på konto nr 2.</li>
				</ol>
				<img src="https://f.datahjelpen.no/qjesx.png" alt="Dropbox Encore website">

				<h2>Steg 3 - oppstart</h2>
				<ol>
					<li>Åpne systemvalg (Apple ikon øverst til høyre).</li>
					<li>Gå inn på brukerkontoer.</li>
					<li>Velg din bruker.</li>
					<li>Velg påloggingsobjekter.</li>
					<li>Trykk på + ikonet</li>
					<li>Finn frem til Dropbox Encore.</li>
				</ol>
				<img src="https://f.datahjelpen.no/nteuit.png" alt="Mac OS startup screen">
			</div>
		</div>
	</header>
@endsection
