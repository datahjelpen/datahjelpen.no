@extends('partials.master')

@section('content-main')


	<h1>Sikkerhet</h1>
	<a href="{{ route('user.setup_2fa') }}">Skru på to-faktor autentisering</a> |
	<a href="{{ route('user.disable_2fa') }}">Skru av to-faktor autentisering</a>

	@if ($is_reauthenticated)
		<p>Du har bekreftet din identitet og har full tilgang (sikkerhetsnivå 2) i {{ $reauthenticated_time_remaining }} minutter.</p>
		<form method="POST" action="{{ route('reauthenticate.deauthenticate') }}">
			{{ csrf_field() }}
			<button>Gå til sikkerhetsnivå 1</button>
		</form>
	@endif

	<br><br><br>


	@if ($user->hasProvider())
		Du er logget inn med en oAuth klient og kan ikke endre e-post eller passord.
	@else
		<form method="POST" action="{{ route('user.update') }}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}

			<label for="email">E-post</label>
			<input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>

			<button type="submit">Oppdater</button>
		</form>

		<form method="POST" action="{{ route('user.update') }}">
			{{ method_field('PATCH') }}
			{{ csrf_field() }}

			<label for="password_current">Nåværende passord</label>
			<input id="password_current" type="password" name="password_current" required>
			<label for="password">Nytt passord</label>
			<input id="password" type="password" name="password" required>
			<label for="password_confirmation">Gjennta passord</label>
			<input id="password_confirmation" type="password" name="password_confirmation" required>

			<button type="submit">Oppdater</button>
		</form>
		<p>Om du endrer passord vil du bli logget ut.</p>
	@endif
@endsection
