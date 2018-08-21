@extends('partials.master')
@section('content-main')
	<header class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Om oss</h1>
			<div class="content-text">
				<p>Firmaet Datahjelpen AS ble stiftet januar 2016 og ligger i Halden.</p>
				<p>Datahjelpen leverer tjenester til både privat- og bedriftsmarkedet. Vi tilbyr blant annet
				oppsett av nettsider, generell datahjelp og en-til-en opplæring. <a href="{{ route('front-page') }}#services">Les mer om våre tjenester</a></p>
				<p>Vårt mål er å gi våre kunder en enklere IT-hverdag på en effektiv måte, til en fornuftig pris.</p>
				<p>Ved vedlikehold av din datamaskin kan du levere den til oss, eventuelt kan vi også være
				behjelpelige med henting. For nærmere informasjon, <a href="{{ route('contact') }}">ta kontakt</a>.</p>
			</div>
		</div>
	</header>
@endsection
