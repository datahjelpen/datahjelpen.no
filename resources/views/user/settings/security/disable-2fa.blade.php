@extends('partials.master')

@section('content-main')
    <section class="page-section">
        <div class="inner-wrapper">
            <h1 class="page-title">Er du sikker på at du vil skru av to-faktor autentisering?</h1>
            <div class="content-text">
                <p>Skriv inn en engangskode for å gå videre.</p>

                <form method="POST" action="{{ route('user.disable_2fa_complete') }}">
                    {{ csrf_field() }}

                    <div class="form-groups">
                        <div class="form-group">
                            <label class="form-label" for="one_time_password">Engangskode</label>
                            <input class="form-input" id="one_time_password" type="tel" name="one_time_password" required autofocus autocomplete="off">
                        </div>
                        <div class="form-group"></div>
                    </div>
                    <div class="form-group">
                        <button class="primary" type="submit">Skru av to-faktor autentisering</button>
                    </div>
                    <a href="{{ route('user.settings.security') }}">Avbryt</a>
                </form>
            </div>
        </div>
    </section>
@endsection
