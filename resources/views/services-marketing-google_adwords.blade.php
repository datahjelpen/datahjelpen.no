@extends('partials.master')
@section('content-main')
	<header class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Google adwords</h1>
			<div class="content-text">
				<h2>Prisliste (per månded)</h2>
				<p>Priser er eks. mva</p>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Størrelse</th>
								<th>Antall annonser</th>
								<th>Sum til Google Adwords</th>
								<th>Håndteringsavgift</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>XS</td>
								<td>Opp til 5</td>
								<td>Opp til 2500</td>
								<td>500</td>
							</tr>
							<tr>
								<td>S</td>
								<td>Opp til 10</td>
								<td>Opp til 5000</td>
								<td>1000</td>
							</tr>
							<tr>
								<td>M</td>
								<td>Opp til 15</td>
								<td>Opp til 7500</td>
								<td>1500</td>
							</tr>
							<tr>
								<td>L</td>
								<td>Opp til 20</td>
								<td>Opp til 10000</td>
								<td>2000</td>
							</tr>
							<tr>
								<td>XL</td>
								<td>Opp til 25</td>
								<td>Opp til 12500</td>
								<td>2500</td>
							</tr>
							<tr>
								<td>-</td>
								<td>Trenger du større?</td>
								<td><a href="{{ route('contact') }}">Kontakt oss</a>, så skreddersyr vi en pakke sammen.</td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h3>Hva er en annonse?</h3>
				<p>Her er et eksempel:</p>
				<img src="https://i.xdh.no/835dd077e20f" alt="Adwords annonse - eksempel">
				<p>Det øverste/første resultatet er en annonse. Merk at det står "Ad" ved siden av linken til siden.
				En annonse kan ha flere søkeord knyttet opp til seg. Man må betale Google hver gang noen trykker på en annonse.
				Hvor mye man betaler Google per klikk avhenger av hvilket søkeord annonsen dukket opp for.
				Alle søkeord har sin egen pris, som blir justert etter blant annet populæritet.</p>
				<h3>Hva mener vi med opp til?</h3>
				<p>Vi tar for oss pakken S. Her sier vi opp til 10 annonser. Dette er fordi hver annonse koster forskjellig.
				Vi kan ikke på forhånd vite hvor mye en annonse vil koste i månden. Se grunn til dette under "hva er en annonse?".</p>
				<h3>Hva skjer om budsjettet ikke brukes opp en måned?</h3>
				<p>Vi tar for oss pakken S. Her er busjettet satt av til Google Adwords på kr 5000,-.
				Om man bare har brukt kr 3000,- en måned så vil det stå kr 2000,- til gode til neste måned.
				Det vil si at hvis man fortsetter med samme pakke som før, så er busjettet for neste måned kr 5000,- + 2000,-.</p>
				<h3>Hva er håndteringsavgiften?</h3>
				<p>Dette er hvor mye vi tar for å sette opp og vedlikeholde alle annonsene dine.
				Priser på forskjellige søkeord endrer seg hele tiden, samt hvilke søkeord som er mest populære (får mest søk/klikk).
				Vi vil også se å hvilke annonser som funker best, og justere slik at du får mest mulig ut av budsjettet ditt.
				I tillegg lager vi en månedlig rapport.</p>
				<h3>Jeg har flere spørsmål</h3>
				<p><a href="{{ route('contact') }}">Ta kontakt</a>, så hjelper vi deg!</p>
			</div>
		</div>
	</header>
@endsection
