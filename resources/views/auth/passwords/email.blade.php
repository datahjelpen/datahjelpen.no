@extends('partials.master')

@section('content-main')
    <h1>Reset passord</h1>
    <form method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <label for="email">E-post</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

        <button type="submit">Send passord reset link</button>
    </form>
@endsection
