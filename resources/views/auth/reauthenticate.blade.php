@extends('partials.master')

@section('content-main')
    <section class="page-section">
        <div class="inner-wrapper">
            <h1 class="page-title">Skriv inn bekreftelseskode for å fortsette</h1>
            <div class="content-text">
                <form method="POST" action="{{ route('reauthenticate.post') }}">
                    {{ csrf_field() }}

                    <div class="form-groups{{ $errors->has('confirmation_code') ? ' has-error' : '' }}">
                        <div class="form-group">
                            <label class="form-label" for="confirmation_code">Bekreftelseskode</label>
                            <input class="form-input" id="confirmation_code" type="confirmation_code" name="confirmation_code" required>

                            @if ($errors->has('confirmation_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('confirmation_code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group"></div>
                    </div>
                    <div class="form-group">
                        <button class="primary" type="submit">Fortsett</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
