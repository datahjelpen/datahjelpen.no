@extends('partials.master')

@section('content-main')
    <section class="page-section">
        <div class="inner-wrapper">
            @include('partials.button-back')
            <h1 class="page-title">Tilbakestill passord</h1>
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-groups">
                    <div class="form-group">
                        <label class="form-label" for="email">E-post</label>
                        <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group"></div>
                </div>

                <div class="form-group">
                    <button class="primary" type="submit">Send passord reset link</button>
                </div>
            </form>
        </div>
    </section>
@endsection
