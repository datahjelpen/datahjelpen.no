@extends('partials.master')

@section('content-main')
    <section class="page-section">
        <div class="inner-wrapper">
            @include('partials.button-back')
            <h1 class="page-title">Denne handlingen/siden krever at vi bekrefter din identitet</h1>
            {{-- <p>Hvordan vil du motta en bekreftelseskode?</p> --}}
            {{-- <div class="form-groups"> --}}
                <form class="form-group" method="POST" action="{{ route('reauthenticate.send_confirmation_code') }}">
                    {{ csrf_field() }}
                    <input id="send_with-email" type="hidden" name="send_with" value="email">
                    <button class="primary" type="submit">Send meg kode på e-post</button>
                </form>
{{--                 <form class="form-group" method="POST" action="{{ route('reauthenticate.send_confirmation_code') }}">
                    {{ csrf_field() }}
                    <input id="send_with-sms" type="hidden" name="send_with" value="sms">
                    <button class="neutral" type="submit">SMS</button>
                </form>

                <form class="form-group" method="POST" action="{{ route('reauthenticate.send_confirmation_code') }}">
                    {{ csrf_field() }}
                    <input id="send_with-dev_bypass" type="hidden" name="send_with" value="dev_bypass">
                    <button class="neutral" type="submit">Hopp over (bare i dev env)</button>
                </form> --}}
            {{-- </div> --}}

            {{-- <p>Det er mulig å sette opp to-faktor autentisering med en app. Gå til <a href="{{ route('user.settings.security') }}">dine sikkerhetsinnstillinger</a> for å sette det opp. Du vil måtte bekrefte din identitet før du kan endre på dine sikkerhetsinnstillinger.</p> --}}
        </div>
    </section>
@endsection
