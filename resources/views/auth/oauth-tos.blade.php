@extends('partials.master')

@section('content-main')
    <h1>Login</h1>
    <p>For å logge inn med {{ ucfirst($provider) }} må du først godta følgende:</p>
    <ul>
        <li><a href="#">Tjenestevilkår</a></li>
        <li><a href="#">Personvernserklæringen</a></li>
    </ul>
    <form method="POST" action="{{ route('login.oauth.complete', $provider) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="checkbox" id="agree_to_tos_privacy" name="agree_to_tos_privacy" required>
        <label for="agree_to_tos_privacy">Jeg har lest og forstått, og godtar tjenestevilkårene og personvernserklæringen.</label>

        <hr>

        <p>Følgende data ble hentet fra {{ ucfirst($provider) }}.</p>
        <p>Under vil du kunne endre på navn og bilde. Om du vil bruke en annen e-post må du logge inn med en annen {{ ucfirst($provider) }} konto, eller lage en vanlig konto med e-post og passord.</p>
        <p>Dataene i feltene vil bli lagret i det du trykker "fullfør registrering"</p>

        <label for="register-input-name" for="">Navn</label>
        <input id="register-input-name" type="text" value="{{ old('user_name', $user_data->name) }}" name="user_name" required>

        <label for="register-input-email">E-post</label>
        <input id="register-input-email" type="email" value="{{ old('user_email', $user_data->email) }}" name="user_email" readonly>

        <label for="register-input-email">Bilde</label>
        <input id="register-input-email" type="file" value="{{ old('user_avatar') }}" name="user_avatar">

        <img src="{{ $user_data->avatar }}" alt="Bilde">
        <button type="button">Last opp nytt bilde</button>
        <button type="button">Fjern bilde</button>

        <hr>

        <button type="submit">Fullfør registrering</button>
    </form>
@endsection
