@extends('partials.master')

@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Innstillinger</h1>
			<div class="content-text">
				<p><a href="{{ route('user.settings.security') }}">Sikkerhet</a></p>
				<p><a href="{{ route('user.settings.change') }}">Endre konto</a></p>
				<p><a href="{{ route('user.settings.delete') }}">Slett konto</a></p>
			</div>
		</div>
	</section>
@endsection
