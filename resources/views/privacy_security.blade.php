@extends('partials.master')
@section('content-main')
	<header class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Personvern{{--  & sikkerhet --}}</h1>
			<div class="content-text">
{{-- 				<h3>Sikkerheten din kommer først i alt vi gjør.</h3>
				<p>Hvis ikke dataene dine er sikre, er de heller ikke private. Derfor sørger vi for at alle våre tjenester er beskyttet.</p>
				<p>Les om vår <a href="#">Sikkerhet</a></p> --}}

				<h3>Vi selger ikke dine personlige opplysninger til noen.</h3>
				<p>Les vår <a href="{{ route('privacy.policy') }}">Personvernerklæring</a></p>
				<p>Les om <a href="{{ route('privacy.policy') }}#cookies">Informasjonskaplser</a></p>
			</div>
		</div>
	</header>
@endsection
