@extends('partials.master')

@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Endre konto</h1>
			<div class="content-text">
				<p>E-post kan kun endres under <a href="{{ route('user.settings.security') }}">sikkerhetsinnstillinger</a>.</p>

				<form method="POST" action="{{ route('user.update') }}">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}

					<div class="form-groups">
						<div class="form-group">
							<label for="form-user-name" class="form-label">Navn:</label>
							<input id="form-user-name" name="name" type="text" class="form-input" value="{{ old('name', $user->name) }}" required autofocus>
						</div>
						<div class="form-group">
							<label for="form-user-phone" class="form-label">Tlf. nr.:</label>
							<input id="form-user-phone" name="phone" type="tel" class="form-input" value="{{ old('phone', $user->phone) }}">
						</div>
					</div>
					<div class="form-groups">
						<div class="form-group">
							<label for="form-user-company" class="form-label">Selskap:</label>
							<input id="form-user-company" name="company" type="text" class="form-input" value="{{ old('company', $user->company) }}">
						</div>
						<div class="form-group">
							<label for="form-user-company_nr" class="form-label">Selskap org. nr.:</label>
							<input id="form-user-company_nr" name="company_nr" type="text" class="form-input" value="{{ old('company_nr', $user->company_nr) }}">
						</div>
					</div>
					<div class="form-group form-group-checkbox">
						<input class="form-input form-input-checkbox" id="agree_tos" name="agree_tos" type="checkbox" {{ old('agree_tos', $user->agree_tos) ? 'checked' : '' }}>
						<label class="form-label" for="agree_tos">Jeg har lest og godtatt <a href="{{ route('tos') }}" target="_blank">tjenestevilkårene</a></label>
					</div>
					<div class="form-group form-group-checkbox">
						<input class="form-input form-input-checkbox" id="agree_privacy" name="agree_privacy" type="checkbox" {{ old('agree_privacy', $user->agree_privacy) ? 'checked' : '' }}>
						<label class="form-label" for="agree_privacy">Jeg har lest og godtatt <a href="{{ route('privacy.policy') }}" target="_blank">personvernserklæringen</a></label>
					</div>
					<div class="form-group form-group-checkbox">
						<input class="form-input form-input-checkbox" id="agree_dpa" name="agree_dpa" type="checkbox" {{ old('agree_dpa', $user->agree_dpa) ? 'checked' : '' }}>
						<label class="form-label" for="agree_dpa">Jeg har lest og godtatt <a href="{{ route('privacy.policy') }}" target="_blank">databehandleravtalen</a></label>
					</div>
					<div class="form-groups">
						<div class="form-groups"></div>
						<div class="form-groups">
							<button class="primary">Oppdater</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
@endsection
