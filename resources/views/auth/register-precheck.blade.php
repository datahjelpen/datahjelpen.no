@extends('partials.master')

@section('content-main')
    <h1>Login</h1>
    <p>For å logge inn med {{ ucfirst($provider) }} må du først godta følgende:</p>
    <ul>
        <li><a href="#">Tjenestevilkår</a></li>
        <li><a href="#">Personvernserklæringen</a></li>
    </ul>
    <form method="POST" action="{{ route('login.oauth.precheck', $provider) }}">
        {{ csrf_field() }}
        <input type="checkbox" id="agree_to_tos_privacy" name="agree_to_tos_privacy" required>
        <label for="agree_to_tos_privacy">Jeg godtar</label>
        <button type="submit">Fortsett til login</button>
    </form>
@endsection
