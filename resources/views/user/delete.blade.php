@extends('partials.master')

@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Slett konto</h1>
			<div class="content-text">
				<p>Hei {{ $user->name }}.</p>
				<p>Du holder på å slette din konto. Dette vil, med øyeblikkelig virkning, avslutte ditt kundeforhold.</p>
				<p>Vi vil ikke lenger lagre data på dine vegne ettersom vi ikke lenger har ditt samtykke.</p>
				<p>Dette innebærer at, om du har domene(r) hos oss, må vi ta de ned, og sende de til deg.
				Vi vil også måtte slette alle eventuelle databaser vi lagrer data i på dine vegne.
				Vi sender de naturligvis til deg først.</p>

				<h2>Bekreft sletting</h2>
				<form method="POST" action="{{ route('user.destroy') }}">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}

					<div class="form-groups">
						<div class="form-group">
							<button class="primary">Ok, slett min konto</button>
						</div>
						<div class="form-group">
							<a class="button neutral" href="{{ route('user') }}">Avbryt</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection
