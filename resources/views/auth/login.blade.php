@extends('partials.master')
@section('content-main')
    <section class="page-section">
        <div class="inner-wrapper">
            <h1 class="page-title">Kundelogin</h1>
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="form-label" for="email">E-post</label>
                    <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label  class="form-label" for="password">Passord</label>
                    <input  class="form-input" id="password" type="password" name="password" required>
                </div>

                <div class="form-group form-group-checkbox">
                    <input class="form-input form-input-checkbox" id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-label" for="remember">Husk meg</label>
                </div>

                <div class="form-groups">
                    <div class="form-group">
                        <a href="{{ route('password.request') }}">
                            Glemt passord?
                        </a>
                    </div>
                    <div class="form-group">
                        <button class="primary" type="submit">Login</button>
                    </div>
                </div>
                <div class="form-group">
                    <a class="button" href="{{ route('login.oauth', 'google') }}">
                        <img class="icon" src="/images/google-logo.svg" alt="G logo">
                        <span>Login via Google</span>
                    </a>
                </div>
            </form>

            <p>Ny kunde? <a href="{{ route('register') }}">Registrer deg</a></p>
        </div>
    </section>
@endsection
