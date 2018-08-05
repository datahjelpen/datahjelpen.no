@extends('partials.master')

@section('content-main')
<section class="page-section">
	<div class="inner-wrapper">
		<h1 class="page-title">{{ __('errors.500.heading') }}</h1>
		<div class="content-text">
			<p>{{ __('errors.500.text') }}</p>
			@if(app()->bound('sentry') && !empty(Sentry::getLastEventID()))
				<div class="subtitle">Error ID: {{ Sentry::getLastEventID() }}</div>
				{{-- Sentry JS SDK 2.1.+ required --}}
				<script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>
				<script>
					Raven.showReportDialog({
						eventId: '{{ Sentry::getLastEventID() }}',
						dsn: '{{ env('SENTRY_LARAVEL_DSN_PUBLIC') }}',
						// user: {
						// 	'name': 'Jane Doe',
						// 	'email': 'jane.doe@example.com',
						// }
					});
				</script>
			@endif
		</div>
	</div>
</section>
@endsection
