@extends('partials.master')

@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Din konto og dine data blir slettet.</h1>
			<p>Om du slettet kontoen din med et uhell, vil du kunne gjennopprette den innen en kort periode.</p>
			<p><a href="{{ route('contact') }}">Ta kontakt</a> med oss så snart som mulig, om du ønsker å gjennopprette din konto og dine data.</p>
		</div>
	</section>
@endsection
