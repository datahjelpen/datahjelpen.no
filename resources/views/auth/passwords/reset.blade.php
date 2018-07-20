@extends('partials.master')

@section('content-main')
    <section class="page-section">
        <div class="inner-wrapper">
            <h1 class="page-title">Tilbakestill passord</h1>

            <form method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label class="form-label" for="email">E-post</label>
                    <input class="form-input" id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
                </div>
                <div class="form-groups">
                    <div class="form-group">
                        <label class="form-label" for="password">Nytt passord</label>
                        <input class="form-input" id="password" type="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Gjennta passord</label>
                        <input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group">
                    <button class="primary" type="submit">Reset passord</button>
                </div>
            </form>
        </div>
    </section>
@endsection
