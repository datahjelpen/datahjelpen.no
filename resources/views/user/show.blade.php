@extends('partials.master')

@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Konto — {{ $current_user->name }}</h1>
			@if ($current_user->id == $user->id)
				<p><a href="{{ route('user.settings') }}">Innstillinger</a></p>
			@endif

			<h2>Dine data</h2>
			<p><strong>Navn:</strong> <span>{{ $user->name ? $user->name : 'Ikke registrert' }}</span></p>
			<p><strong>E-post:</strong> <span>{{ $user->email ? $user->email : 'Ikke registrert' }}</span></p>
			<p><strong>Tlf. nr.:</strong> <span>{{ $user->phone ? $user->phone : 'Ikke registrert' }}</span></p>

			<p><strong>Selskap:</strong> <span>{{ $user->company ? $user->company : 'Ikke registrert' }}</span></p>
			<p><strong>Selskap org. nr.:</strong> <span>{{ $user->company_nr ? $user->company_nr : 'Ikke registrert' }}</span></p>

			<!-- <p><strong>Godtatt tjenestevilkår:</strong> <span>{{ $user->agree_tos ? 'Ja' : 'Nei' }}</span></p> -->
			<p><strong>Godtatt personvernserklæringen:</strong> <span>{{ $user->agree_privacy ? 'Ja' : 'Nei' }}</span></p>
			<p><strong>Godtatt databehandleravtale:</strong> <span>{{ $user->agree_dpa ? 'Ja' : 'Nei' }}</span></p>

			<p><a href="{{ route('user.edit') }}">Endre</a> | <a href="{{ route('user.delete') }}">Slett</a></p>
		</div>
	</section>
@endsection
