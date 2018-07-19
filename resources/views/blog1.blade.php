@extends('partials.master')
@section('content-main')
	<header class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Windows 10 - Sletting av midlertidige filer</h1>
			<div class="content-text">
				<h2>Metode 1</h2>
				<ol>
					<li>Trykk Windows knapp + I</li>
					<li>Gå inn på system</li>
					<li>Velg lagring</li>
					<li>Trykk på C: disken</li>
					<li>Trykk på midlertidig filer</li>
					<li>Huk av alle og trykk slett</li>
				</ol>
				<p>Om dette ikke funker og den bare henger, se metode 2.</p>
				<img src="https://f.datahjelpen.no/mbaxh.png" alt="Windows settings window">
				<h2>Metode 2</h2>
				<p><strong>OBS!</strong> Denne metoden innebærer destruktive handlinger som kan føre til
				uforutsette endringer. Gjør dette på eget ansvar.
				<br>Ønsker du hjelp, <a href="{{ route('contact') }}">ta kontakt</a></p>
				<ol>
					<li>Trykk Windows knapp + E</li>
					<li>
						Trykk CTRL+L og skriv inn:
						<div class="form-group">
							<input class="form-input" type="text" readonly value="%WINDIR%\SoftwareDistribution\Download">
						</div>
					</li>
					<li>Slett alt inne i denne mappen</li>
				</ol>
				<p>Ettersom sletting på vanlig måte kan henge seg opp, bruker vi en kommando for dette.</p>
				<ol>
					<li>Trykk Windows knapp + R</li>
					<li>Skriv inn CMD i det vindu som popper opp, og trykk ok</li>
					<li>
						Skriv inn:
						<div class="form-group">
							<input class="form-input" type="text" readonly value="del C:\Windows\SoftwareDistribution\Download\*.* /s /q">
						</div>
					</li>
				</ol>
				<img src="https://f.datahjelpen.no/moaszq.png" alt="Windows Command Prompt">
			</div>
		</div>
	</header>
@endsection
