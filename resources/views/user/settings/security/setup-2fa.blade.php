@extends('partials.master')

@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Skru på to-faktor autentisering</h1>
			<div class="content-text">
				<form method="POST" action="{{ route('user.setup_2fa_new_secret') }}">
					{{ csrf_field() }}

					<div class="form-groups">
						<div class="form-group">
							<label class="form-label">Hemmelig kode</label>
							<input class="form-input" type="text" value="{{ $user->secret_2fa }}" readonly>
							<label class="form-label" for="">Generer ny hemmelig kode</label>
							<button class="neutral" type="submit"><span>Generer</span><i class="icon" data-feather="refresh-ccw"></i></button>
						</div>
						<div class="form-group">
							<label class="form-label" for="">QR kode</label>
							<img src="{{ $qr_img }}" style="width: 256px; align-self: flex-start;">
						</div>
					</div>
				</form>

				<form method="POST" action="{{ route('user.setup_2fa_complete') }}">
					{{ csrf_field() }}
					<div class="form-groups">
						<div class="form-group">
							<label class="form-label" for="one_time_password">Engangskode</label>
							<input class="form-input" id="one_time_password" type="tel" name="one_time_password" required autofocus autocomplete="off">
						</div>
						<div class="form-group"></div>
					</div>
					<div class="form-group">
						<button class="primary" type="submit">Fullfør oppsett</button>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection
