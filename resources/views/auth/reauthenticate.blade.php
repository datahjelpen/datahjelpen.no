@extends('partials.master')

@section('content-main')
    <h1>Skriv inn bekreftelseskode for å fortsette</h1>
    <form method="POST" action="{{ route('reauthenticate.post') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('confirmation_code') ? ' has-error' : '' }}">
            <label for="confirmation_code" class="col-md-4 control-label">Bekreftelseskode</label>

            <div class="col-md-6">
                <input id="confirmation_code" type="confirmation_code" class="form-control" name="confirmation_code" required>

                @if ($errors->has('confirmation_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('confirmation_code') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <button type="submit">Fortsett</button>
    </form>
@endsection
