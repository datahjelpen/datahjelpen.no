@extends('partials.master')

@section('content-main')
    <h1>Reset passord</h1>
    <form method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">

        <label for="email">E-post</label>
        <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>

        <label for="password">Nytt passord</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Gjennta passord</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <button type="submit">Reset passord</button>
    </form>
@endsection
