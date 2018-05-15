@extends('partials.master')

@section('content-main')
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <label for="email">E-post</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

        <label for="password">Passord</label>
        <input id="password" type="password" name="password" required>

        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Husk meg
        </label>

        <button type="submit">Login</button>

        <a href="{{ route('password.request') }}">
            Glemt passord?
        </a>
    </form>

    <a href="/login/google">Login via Google</a>
@endsection
