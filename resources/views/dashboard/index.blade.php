@extends('partials.master')

@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Kontrollpanel</h1>
			<p>Hei {{ $user->name }}</p>

			<div class="content-text">
				<h2>Linker</h2>

				<p><a href="{{ route('user') }}">Gå til min konto</a></p>
				<p><a href="{{ route('privacy.policy') }}">Databehandleravtale</a></p>
			</div>
		</div>
	</section>
	<h1></h1>
@endsection
