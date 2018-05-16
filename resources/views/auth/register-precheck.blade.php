@extends('partials.master')

@section('content-main')
    <h1>Login</h1>
    <p>For å logge inn med {{ ucfirst($provider) }} må du først godta følgende:</p>
    <ul>
        <li><a href="#">Tjenestevilkår</a></li>
        <li><a href="#">Personvernserklæringen</a></li>
    </ul>
    <form action="">
        <input type="checkbox" required>
        <label for="">Jeg godtar</label>
        <button type="submit">Fortsett til login</button>
    </form>
@endsection
