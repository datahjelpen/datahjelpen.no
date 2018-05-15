@extends('partials.master')

@section('content-main')
    <h1>Er du sikker på at du vil skru av to-faktor autentisering?</h1>
    <form method="POST" action="{{ route('user.disable_2fa_complete') }}">
        {{ csrf_field() }}

        <button type="submit">Ja</button>
        <a href="{{ route('user.settings.security') }}">Nei</a>
    </form>
@endsection
