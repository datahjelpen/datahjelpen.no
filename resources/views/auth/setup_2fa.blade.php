@extends('partials.master')

@section('content-main')
	<h1>2fa setup</h1>

	<form method="POST" action="{{ route('user.setup_2fa_new_secret') }}">
		{{ csrf_field() }}
		<img src="{{ $qr_img }}">
		<p>
			<span>Hemmelig kode:</span>
			<code>{{ $user->secret_2fa }}</code>
			<button type="submit">Generer ny hemmelig kode</button>
		</p>
	</form>

	<form method="POST" action="{{ route('user.setup_2fa_complete') }}">
		{{ csrf_field() }}
		<label for="">Engangskode</label>
		<input id="one_time_password" type="tel" name="one_time_password" required autofocus autocomplete="off">
		<button type="submit">Fullfør oppsett</button>
	</form>
@endsection
