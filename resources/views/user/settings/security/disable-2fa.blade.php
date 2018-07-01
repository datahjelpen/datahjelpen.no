@extends('partials.master')

@section('content-main')
    <h1>Er du sikker på at du vil skru av to-faktor autentisering?</h1>
    <p>Skriv inn en engangskode for å gå videre.</p>

    <form method="POST" action="{{ route('user.disable_2fa_complete') }}">
        {{ csrf_field() }}

				<label for="">Engangskode</label>
				<input id="one_time_password" type="tel" name="one_time_password" required autofocus autocomplete="off">
        <button type="submit">Skru av to-faktor autentisering</button>
        <a href="{{ route('user.settings.security') }}">Avbryt</a>
    </form>
@endsection
