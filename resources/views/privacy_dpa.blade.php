@extends('partials.master')
@section('content-main')
	<header class="page-section page-legal">
		<div class="inner-wrapper">
			<h1 class="page-title">Databehandleravtale</h1>
			<div class="content-text content-text-legal">
				<div class="content-text-legal-introduction">
					<p>I henhold til Europa-parlamentets og Rådets forordning (EU) 2016/679 av 27. april 2016 om
					vern av fysiske personer i forbindelse med behandling av personopplysninger og om fri
					utveksling av slike opplysninger, samt om oppheving av direktiv 95/46/EF, Artikkel 28 og 29,
					jf. Artikkel 32-36, inngås følgende avtale</p>
					<p>mellom</p>
					<p>(behandlingsansvarlig)</p>
					<p><em>KUNENAVN AS</em></p>
					<p>og</p>
					<p><em>{{ config('app.name_legal') }}</em></p>
					<p>(databehandler)</p>
					<p><strong>Databehandler</strong> er Datahjelpen AS, heretter omtalt som "Leverandør" eller
					"databehandler".</p>
					<p><strong>Behandlingsansvarlig</strong> er kunde, heretter omtalt som "Kunde" eller
					"behandlingsansvarlig".</p>
				</div>

				<h2>1. Avtalens hensikt</h2>
				<p>Avtalens hensikt er å regulere rettigheter og plikter etter personvernlovgivning slik det
				vil bli implementert og gjennomført i norsk lovgivning. EUs nye forordning for personvern
				GDPR, trer i kraft 20. juli 2018. Avtalen skal sikre at personopplysninger om de registrerte
				ikke brukes urettmessig eller kommer uberettigede i hende, sikre de registrertes rettigheter
				og ivareta personvernprinsippene i henhold til artikkel 5.</p>
				<p>Avtalen regulerer Leverandørs bruk av personopplysninger på vegne av den Kunde, herunder
				innsamling, registrering, sammenstilling, lagring, utlevering eller kombinasjoner av disse i
				forbindelse med leveranse av ISP-tjenester, herunder drift og administrasjon av domenenavn,
				virtuelle servere, webhotell og e-post-tjenester (heretter omtalt som «ISP-tjenester»).</p>

				<h2>2. Instrukser</h2>
				<p>Databehandler skal følge de skriftlige instrukser for forvaltning av personopplysninger
				for ISP-tjenester, som behandlingsansvarlig har bestemt skal gjelde.</p>
				<p>Databehandler forplikter seg til å overholde alle plikter i henhold til
				Europa-parlamentets og Rådets forordning (EU) 2016/679 av 27. april 2016 som gjelder ved
				bruk av ISP-tjenester til behandling av personopplysninger.</p>
				<p>Databehandler forplikter seg til å varsle behandlingsansvarlig dersom databehandler
				mottar instrukser fra behandlingsansvarlig som er i strid med bestemmelsene i
				Europa-parlamentets og Rådets forordning (EU) 2016/679 av 27. april 2016.</p>

				<h2>3. Formålsbegrensning</h2>
				<p>Formålet med databehandlers forvaltning av personopplysninger på vegne av
				behandlingsansvarlig, er å levere og administrere ISP-tjenester.</p>
				<p>Personopplysninger som databehandler forvalter på vegne av behandlingsansvarlig kan ikke
				brukes til andre formål enn levering og administrasjon av ISP-tjenester uten at dette på
				forhånd er godkjent av behandlingsansvarlig.</p>
				<p>Databehandler kan ikke overføre personopplysninger som omfattes av denne avtalen til
				samarbeidspartnere eller andre tredjeparter uten at dette på forhånd er godkjent av
				behandlingsansvarlig, jf. punkt 10 i denne avtalen.</p>

				<h2>4. Opplysningstyper og registrerte</h2>
				<p>Det er Kunde sitt ansvar å vedlikeholde en oversikt over hvilke personopplysninger
				Leverandør behandler på vegne av Kunde, samt registrerte berørte.</p>
				<p>Personopplysninger som behandles på vegne av Kunde i forbindelse med levering og
				administrasjon av Leverandørs ISP-tjenester kan være navn, fødselsdato, adresser,
				telefonnumre, e-postadresser, IP-adresser, brukernavn, passord, informasjonskapsler,
				kundenumre, kjøpshistorikk, loggfiler eller enhver annen opplysning, som definert av Kunde,
				kan bli brukt alene eller sammen med annen opplysning til å identifisere en fysisk person.</p>
				<p>De registrerte som Leverandør behandler personopplysninger på vegne av i forbindelse med
				levering og administrasjon av Leverandørs ISP-tjenester kan være kunder, leverandører,
				ansatte, studenter, besøkende, medlemmer, deltakere eller enhver annen gruppe av fysiske
				personer, som definert av Kunde.</p>

				<h2>5. De registrertes rettigheter</h2>
				<p>Databehandler plikter å bistå behandlingsansvarlig ved ivaretakelse av den registrertes
				rettigheter, jf. Europa-parlamentets og Rådets forordning (EU) 2016/679 av 27. april 2016,
				kapittel III.</p>
				<p>Den registrertes rettigheter inkluderer retten til informasjon om hvordan deres
				personopplysninger behandles, retten til å kreve innsyn i egne personopplysninger, retten
				til å kreve retting eller sletting av egne personopplysninger og retten til å kreve at
				behandlingen av egne personopplysninger begrenses.</p>
				<p>I den grad det er relevant, skal databehandler bistå behandlingsansvarlig med å ivareta
				de registrertes rett til dataportabilitet og retten til å motsette seg automatiske
				avgjørelser, inkludert profilering.</p>
				<p>Databehandler er erstatningsansvarlig overfor de registrerte dersom feil eller
				forsømmelser hos databehandler påfører de registrerte økonomiske eller ikke-økonomiske tap
				som følge av at deres rettigheter eller personvern er krenket.</p>

				<h2>6. Tilfredsstillende informasjonssikkerhet</h2>
				<p>Databehandler skal iverksette tilfredsstillende tekniske, fysiske og organisatoriske
				sikringstiltak for å beskytte personopplysninger som omfattes av denne avtalen mot
				uautorisert eller ulovlig tilgang, endring, sletting, skade, tap eller utilgjengelighet.</p>
				<p>Databehandler skal dokumentere egen sikkerhetsorganisering, retningslinjer og rutiner for
				sikkerhetsarbeidet, risikovurderinger og etablerte tekniske, fysiske eller organisatoriske
				sikringstiltak. Dokumentasjonen skal være tilgjengelig for behandlingsansvarlig.</p>
				<p>Databehandler skal etablere kontinuitets- og beredskapsplaner for effektiv håndtering av
				alvorlige sikkerhetshendelser. Dokumentasjonen skal være tilgjengelig for
				behandlingsansvarlig.</p>
				<p>Databehandler skal gi egne ansatte tilstrekkelig informasjon om og opplæring i
				informasjonssikkerhet slik at sikkerheten til personopplysninger som behandles på vegne av
				behandlingsansvarlig blir ivaretatt.</p>
				<p>Databehandler skal dokumentere opplæringen av egne ansatte i informasjonssikkerhet.
				Dokumentasjonen skal være tilgjengelig for behandlingsansvarlig.</p>

				<h3>6.1 Noen viktige sikkerhetstiltak hos databehandler</h3>
				<ul>
					<li>TLS-sertifikater på alle domener. Disse krypterer trafikk mellom bruker og server.</li>
					<li>Brukernes passord blir alltid kryptert.</li>
					<li>Ekstern innlogging med admin/root-bruker er deaktivert på alle våre servere.</li>
					<li>Innlogging på våre servere foregår kun med public/private-key med passord.</li>
					<li>Tilgangskontroll.</li>
				</ul>

				<h2>7. Taushetsplikt</h2>
				<p>Kun ansatte hos databehandler som har tjenstlige behov for tilgang til personopplysninger
				som forvaltes på vegne av behandlingsansvarlig, kan gis slik tilgang. Databehandler plikter
				å dokumentere retningslinjer og rutiner for tilgangsstyring. Dokumentasjonen skal være
				tilgjengelig for behandlingsansvarlig.</p>
				<p>Ansatte hos databehandler har taushetsplikt om dokumentasjon og personopplysninger som
				vedkommende får tilgang til i henhold til denne avtalen. Denne bestemmelsen gjelder også
				etter avtalens opphør. Taushetsplikten omfatter ansatte hos tredjeparter som utfører
				vedlikehold (eller liknende oppgaver) av systemer, utstyr, nettverk eller bygninger som
				databehandler anvender for å levere eller administrere ISP-tjenester.</p>

				<h2>8. Tilgang til sikkerhetsdokumentasjon</h2>
				<p>Databehandler plikter å gi behandlingsansvarlig tilgang til all sikkerhetsdokumentasjon
				som er nødvendig for at behandlingsansvarlig skal kunne ivareta sine forpliktelser i henhold
				til Europa-parlamentets og Rådets forordning (EU) 2016/679 av 27. april 2016, Artikkel 5
				nr.1 bokstav f og Artikkel 32-36.</p>
				<p>Databehandler plikter å gi behandlingsansvarlig tilgang til annen relevant dokumentasjon
				som gjør det mulig for behandlingsansvarlig å vurdere om databehandler overholder vilkårene
				i denne avtalen.</p>
				<p>Ansatte hos behandlingsansvarlig har taushetsplikt for konfidensiell
				sikkerhetsdokumentasjon som databehandler gjør tilgjengelig for behandlingsansvarlig.</p>

				<h2>9. Varslingsplikt ved sikkerhetsbrudd</h2>
				<p>Databehandler skal uten ubegrunnet opphold varsle behandlingsansvarlig dersom
				personopplysninger som forvaltes på vegne av behandlingsansvarlig utsettes for
				sikkerhetsbrudd som innebærer risiko for krenkelser av de registrertes personvern.</p>
				<p>Varslet til behandlingsansvarlig skal som minimum inneholde informasjon som beskriver
				sikkerhetsbruddet, hvilke registrerte som er berørt av sikkerhetsbruddet, hvilke
				personopplysninger som er berørt av sikkerhetsbruddet, hvilke strakstiltak som er iverksatt
				for å håndtere sikkerhetsbruddet og hvilke forebyggende tiltak som eventuelt er etablert
				for å unngå liknende hendelser i fremtiden.</p>
				<p>Behandlingsansvarlig er ansvarlig for at varsler om sikkerhetsbrudd fra databehandler
				blir videreformidlet til Datatilsynet.</p>

				<h2>10. Underleverandører</h2>
				<p>Databehandler plikter å inngå egne avtaler med underleverandører til ISP-tjenester som
				regulerer underleverandørenes forvaltning av personopplysninger i forbindelse med levering
				og administrasjon av ISP-tjenester.</p>
				<p>I avtaler mellom databehandler og underleverandører skal underleverandørene pålegges å
				ivareta alle plikter som databehandleren selv er underlagt i henhold til denne avtalen.
				Databehandler plikter å forelegge avtalene for behandlingsansvarlig etter forespørsel.</p>
				<p>Databehandler skal kontrollere at underleverandører til ISP-tjenester overholder sine
				avtalemessige plikter, spesielt at informasjonssikkerheten er tilfredsstillende og at
				ansatte hos underleverandører er kjent med sine forpliktelser og oppfyller disse.</p>
				<p>Behandlingsansvarlig godkjenner at databehandler engasjerer følgende underleverandører i
				forbindelse med levering og administrasjon av ISP-tjenester:</p>
				<ul>
					<li>DigitalOcean LLC</li>
					<li>Domeneshop AS</li>
					<li>Functional Software Inc.</li>
					<li>Google LLC.</li>
					<li>Google Commerce Ltd.</li>
					<li>Amazon Web Services Inc.</li>
					<li>Ampersplash Ltd.</li>
					<li>The Rocket Science Group LLC.</li>
					<li>Algolia Inc.</li>
				</ul>
				<p>Databehandler kan ikke engasjere andre underleverandører enn de som er nevnt ovenfor uten
				at dette på forhånd er godkjent av behandlingsansvarlig.</p>
				<p>Databehandler er erstatningsansvarlig overfor behandlingsansvarlig for økonomiske tap som
				påføres behandlingsansvarlig og som skyldes ulovlig eller urettmessig behandling av
				personopplysninger eller mangelfull informasjonssikkerhet hos underleverandører til
				ISP-tjenester.</p>

				<h2>11. Overføring til land utenfor EU/EØS</h2>
				<p>Personopplysninger som Leverandør forvalter i henhold til denne avtalen kan overføres til
				et land utenfor EU/EØS hvis det er nødvendig for å kunne levere tjenesten i henhold til
				Tjenesteavtale gitt at enten (a) en slik overføring er lovlig i henhold til rettsgrunnlaget
				eller (b) Kunde har innhentet nødvendig aksept fra berørte registerte.</p>
				<p>Hvis utlevering av personopplysninger kreves i henhold til unionsretten eller
				medlemsstatenes nasjonale rett, som Leverandør er underlagt, skal Leverandør underrette
				Kunde om nevnte rettslige krav før behandlingen, med mindre denne rett av hensyn til viktige
				samfunnsinteresser forbyr en slik underretning.</p>

				<h2>12. Sikkerhetsrevisjoner og konsekvensutredninger</h2>
				<p>Databehandler skal jevnlig gjennomføre sikkerhetsrevisjoner av eget arbeid med sikring av
				personopplysninger mot uautorisert eller ulovlig tilgang, endring, sletting, skade, tap
				eller utilgjengelighet.</p>
				<p>Databehandler skal gjennomføre sikkerhetsrevisjoner av informasjonssikkerheten i
				ISP-tjenester. Sikkerhetsrevisjoner skal omfatte databehandlers sikkerhetsmål og
				sikkerhetsstrategi, sikkerhetsorganisering, retningslinjer og rutiner for
				sikkerhetsarbeidet, etablerte tekniske, fysiske og organisatoriske sikringstiltak og
				arbeidet med informasjonssikkerhet hos underleverandører til ISP-tjenester. Det skal i
				tillegg omfatte rutiner for varsling av behandlingsansvarlig ved sikkerhetsbrudd og rutiner
				for testing av beredskaps- og kontinuitetsplaner.</p>
				<p>Databehandler skal dokumentere sikkerhetsrevisjonene. Behandlingsansvarlig skal gis
				tilgang til revisjonsrapportene.</p>
				<p>Dersom en uavhengig tredjepart gjennomfører sikkerhetsrevisjoner hos databehandler, skal
				behandlingsansvarlig informeres om hvilken revisor som benyttes og få tilgang til
				oppsummeringer av revisjonsrapportene.</p>
				<p>Dersom Kunde selv ønsker å utføre en slik revisjon må alle kostnader som følger bæres av
				Kunde. Dette inkluderer kostnader til den uavhengige tredjeparten, kostnader Leverandør
				påføres i form av benyttet arbeidstid, materielle kostnader og andre kostnader som følge av
				revisjonen.</p>
				<p>Databehandler skal bistå behandlingsansvarlig dersom bruk av ISP-tjenester medfører at
				behandlingsansvarlig har plikt til å utrede personvernkonsekvenser før ISP-tjenester tas i
				bruk, jf. Europa-parlamentets og Rådets forordning (EU) 2016/679 av 27. april 2016, Artikkel
				35 og 36. Databehandler kan bistå behandlingsansvarlig ved iverksetting av
				personvernfremmende tiltak dersom konsekvensutredningen viser at dette er nødvendig.</p>

				<h2>13. Tilbakelevering og sletting</h2>
				<p>Ved opphør av denne avtalen plikter databehandler å slette og tilbakelevere alle
				personopplysninger som forvaltes på vegne av behandlingsansvarlig i forbindelse med levering
				og administrasjon av ISP-tjenester. Behandlingsansvarlig bestemmer hvordan tilbakelevering
				av personopplysningene skal skje, herunder hvilket format som skal benyttes.</p>
				<p>Databehandler skal slette personopplysninger fra alle lagringsmedier som inneholder
				personopplysninger som databehandler forvalter på vegne av behandlingsansvarlig. Sletting
				skal skje ved at databehandler skriver over personopplysninger innen 60 (seksti) dager etter
				avtalens opphør. Dette gjelder også for sikkerhetskopier av personopplysningene.</p>
				<p>Databehandler skal dokumentere at sletting av personopplysninger er foretatt i henhold
				til denne avtalen. Dokumentasjonen skal gjøres tilgjengelig for behandlingsansvarlig.</p>
				<p>Databehandler dekker alle kostnader i forbindelse med tilbakelevering og sletting av de
				personopplysninger som omfattes av denne avtalen.</p>


				<h2>14. Mislighold</h2>
				<p>Ved mislighold av vilkårene i denne avtalen som skyldes feil eller forsømmelser fra
				databehandlers side, kan behandlingsansvarlig si opp avtalen med øyeblikkelig virkning.
				Databehandler vil fortsatt være pliktig til å tilbakelevere og slette personopplysninger som
				forvaltes på vegne av behandlingsansvarlig i henhold til bestemmelsene i punkt 13 ovenfor.</p>
				<p>Behandlingsansvarlig kan kreve erstatning for økonomiske tap som feil eller forsømmelser
				fra databehandlers side, inkludert mislighold av vilkårene i denne avtalen, har påført
				behandlingsansvarlig, jf. også punkt 5 og 10 ovenfor.</p>

				<h2>15. Avtalens varighet</h2>
				<p>Denne avtalen gjelder så lenge databehandler forvalter personopplysninger på vegne av
				behandlingsansvarlig.</p>

				<h2>16. Meddelelser</h2>
				<p>Leverandør vil sende meddelelser skriftlig etter denne avtalen til den enhver tid
				oppgitte kundekontakten i kundeforholdet. Kunde må sende meddelelser skriftlig til
				<a href="mailto:personvern@datahjelpen.no">personvern@datahjelpen.no</a>.</p>


				<h2>17. Lovvalg og verneting</h2>
				<p>Avtalen er underlagt norsk rett og partene vedtar Sandefjord Tingrett som verneting.
				Dette gjelder også etter opphør av avtalen.</p>
			</div>
		</div>
	</header>
@endsection
