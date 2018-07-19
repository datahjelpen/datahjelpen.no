@extends('partials.master')
@section('content-main')
	<header class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Kontakt oss</h1>
			<div class="content-text">
				<p><span>E-post: </span><a href="mailto:post@datahjelpen.no">post@datahjelpen.no</a></p>
				<p><span>Telefon: </span><a href="tlf:46531170">465 31 170</a></p>
			</div>
			<form action="{{ route('contact') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-groups">
					<div class="form-group">
						<label class="form-label" for="contact-name">Navn</label>
						<input class="form-input" id="contact-name" name="name" type="text" value="{{ old('name') }}">
					</div>
					<div class="form-group">
						<label class="form-label" for="contact-email">E-post *</label>
						<input class="form-input" id="contact-email" name="email" type="Email" required value="{{ old('email') }}">
					</div>
				</div>
				<div class="form-group">
					<label class="form-label" for="contact-message">Melding *</label>
					<textarea class="form-input" id="contact-message" name="message" required>{{ old('message') }}</textarea>
				</div>
				<div class="form-groups">
					<div class="form-group"></div>
					<div class="form-group">
						<button class="primary" type="submit">
							<span>Send</span>
							<i class="icon" data-feather="send"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</header>
@endsection
