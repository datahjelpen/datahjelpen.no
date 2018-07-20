@extends('partials.master')

@section('content-main')
    <section class="page-section">
        <div class="inner-wrapper">
            <h1 class="page-title">Registrer</h1>
            <p>For å logge inn med {{ ucfirst($provider) }} må du først godta følgende:</p>
            <ul>
                <li><a href="{{ route('tos') }}">Tjenestevilkår</a></li>
                <li><a href="{{ route('privacy.policy') }}">Personvernserklæringen</a></li>
            </ul>
            <form method="POST" action="{{ route('login.oauth.complete', $provider) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group form-group-checkbox{{ $errors->has('agree_to_tos_privacy') ? ' error' : null }}">
                    <input class="form-input form-input-checkbox" id="agree_to_tos_privacy" name="agree_to_tos_privacy" type="checkbox" {{ old('agree_to_tos_privacy') ? 'checked' : '' }}>
                    <label class="form-label" for="agree_to_tos_privacy">Jeg har lest og forstått, og godtar <a href="{{ route('tos') }}" target="_blank">tjenestevilkårene</a> og <a href="{{ route('privacy.policy') }}" target="_blank">personvernserklæringen</a></label>
                </div>

                <p>Følgende data ble hentet fra {{ ucfirst($provider) }}.</p>
                <p>Under vil du kunne endre på navn. Om du vil bruke en annen e-post må du logge inn med en annen {{ ucfirst($provider) }} konto, eller lage en vanlig konto med e-post og passord.</p>
                <p>Dataene i feltene vil bli lagret i det du trykker "fullfør registrering"</p>

                <div class="form-groups">
                    <div class="form-group">
                        <label class="form-label" for="register-input-name" for="">Navn</label>
                        <input class="form-input" id="register-input-name" type="text" value="{{ old('user_name', $user_data->name) }}" name="user_name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="register-input-email">E-post</label>
                        <input class="form-input" id="register-input-email" type="email" value="{{ old('user_email', $user_data->email) }}" name="user_email" readonly>
                    </div>
                </div>


                {{-- <label for="register-input-email">Bilde</label> --}}
                {{-- <input id="register-input-email" type="hidden" value="{{ old('user_avatar') }}" name="user_avatar"> --}}

                {{-- <img src="{{ $user_data->avatar }}" alt="Bilde"> --}}
                {{-- <button type="button">Last opp nytt bilde</button> --}}
                {{-- <button type="button">Fjern bilde</button> --}}

                <button class="primary" type="submit">Fullfør registrering</button>
            </form>
        </div>
    </section>
@endsection
