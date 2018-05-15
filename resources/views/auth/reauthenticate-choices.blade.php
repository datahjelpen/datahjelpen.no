@extends('partials.master')

@section('content-main')
    @include('partials.button-back')
    <h1>Denne handlingen/siden krever at vi bekrefter din identitet</h1>

    <p>Hvordan vil du motta en bekreftelseskode?</p>
    <form method="POST" action="{{ route('reauthenticate.send_confirmation_code') }}">
        {{ csrf_field() }}
        <input id="send_with-email" type="hidden" name="send_with" value="email">
        <button type="submit">E-post</button>
    </form>
    <form method="POST" action="{{ route('reauthenticate.send_confirmation_code') }}">
        {{ csrf_field() }}
        <input id="send_with-sms" type="hidden" name="send_with" value="sms">
        <button type="submit">SMS</button>
    </form>

    <form method="POST" action="{{ route('reauthenticate.send_confirmation_code') }}">
        {{ csrf_field() }}
        <input id="send_with-dev_bypass" type="hidden" name="send_with" value="dev_bypass">
        <button type="submit">Hopp over (bare i dev env)</button>
    </form>

    <p>Det er mulig å sette opp to-faktor autentisering med en app. Gå til <a href="{{ route('user.settings.security') }}">dine sikkerhetsinnstillinger</a> for å sette det opp. Du vil måtte bekrefte din identitet før du kan endre på dine sikkerhetsinnstillinger.</p>
@endsection
