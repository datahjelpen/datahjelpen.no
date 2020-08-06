@extends('partials.master')

@section('content-main')
    <section class="page-section">
        <div class="inner-wrapper">
            <h1 class="page-title">Registrer</h1>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <input id="honey" type="text" name="firstname"> {{-- honeypot --}}

                <div class="form-group">
                    <label class="form-label" for="name">Navn</label>
                    <input class="form-input" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">E-post</label>
                    <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-groups">
                    <div class="form-group">
                        <label class="form-label" for="password">Passord</label>
                        <input class="form-input" id="password" type="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Gjennta passord</label>
                        <input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group form-group-checkbox{{ $errors->has('agree_to_tos_privacy') ? ' error' : null }}">
                    <input class="form-input form-input-checkbox" id="agree_to_tos_privacy" name="agree_to_tos_privacy" type="checkbox" {{ old('agree_to_tos_privacy') ? 'checked' : '' }}>
                    <label class="form-label" for="agree_to_tos_privacy">Jeg har lest og forstått, og godtar <a href="{{ route('privacy.policy') }}" target="_blank">personvernserklæringen</a></label>
                </div>

                <div class="form-group">
                    <button class="primary" type="submit">Registrer</button>
                </div>

                <!-- <div class="form-group">
                    <a class="button" href="{{ route('login.oauth', 'google') }}">
                        <img class="icon" src="/images/google-logo.svg" alt="G logo">
                        <span>Login via Google</span>
                    </a>
                </div> -->

                <p>Eksisterende kunde? <a href="{{ route('login') }}">login</a></p>
            </form>
        </div>
    </section>
@endsection
