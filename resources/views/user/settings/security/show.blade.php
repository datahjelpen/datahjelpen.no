@extends('partials.master')

@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Sikkerhet</h1>
			<div class="content-text">
				<a href="{{ route('user.setup_2fa') }}">Skru på to-faktor autentisering</a> |
				<a href="{{ route('user.disable_2fa') }}">Skru av to-faktor autentisering</a>

{{-- 				@if ($is_reauthenticated)
					<p>Du har bekreftet din identitet og har full tilgang (sikkerhetsnivå 2) i {{ $reauthenticated_time_remaining }} minutter.</p>
					<form method="POST" action="{{ route('reauthenticate.deauthenticate') }}">
						{{ csrf_field() }}
						<button class="neutral">Gå til sikkerhetsnivå 1</button>
					</form>
				@endif --}}

				@if ($user->hasProvider())
					Du er logget inn med en oAuth klient og kan ikke endre e-post eller passord.
				@else
					<form method="POST" action="{{ route('user.update') }}">
						{{ method_field('PATCH') }}
						{{ csrf_field() }}

						<div class="form-group">
							<label class="form-label" for="email">E-post</label>
							<input class="form-input" id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
						</div>

						<div class="form-group">
							<button class="neutral" type="submit">Oppdater</button>
						</div>
					</form>

					<form method="POST" action="{{ route('user.update') }}">
						{{ method_field('PATCH') }}
						{{ csrf_field() }}

						<div class="form-group">
							<label class="form-label" for="password_current">Nåværende passord</label>
							<input class="form-input" id="password_current" type="password" name="password_current" required>
						</div>
						<div class="form-groups">
							<div class="form-group">
								<label class="form-label" for="password">Nytt passord</label>
								<input class="form-input" id="password" type="password" name="password" required>
							</div>
							<div class="form-group">
								<label class="form-label" for="password_confirmation">Gjennta passord</label>
								<input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required>
							</div>
						</div>

						<div class="form-groups">
							<div class="form-group">
								<button class="neutral" type="submit">Oppdater</button>
							</div>
							<div class="form-group">
								<p>Om du endrer passord vil du bli logget ut.</p>
							</div>
						</div>
					</form>
				@endif
			</div>
		</div>
	</section>
@endsection
