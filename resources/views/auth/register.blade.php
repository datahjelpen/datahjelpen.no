@extends('partials.master')

@section('content-main')
    <h1>Login</h1>
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <label for="name">Navn</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

        <label for="email">E-post</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Passord</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Gjennta passord</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <button type="submit">Registrer</button>

        <a href="{{ route('password.request') }}">
            Glemt passord?
        </a>
    </form>

    <a href="/login/google/precheck">Login via Google</a>
@endsection
