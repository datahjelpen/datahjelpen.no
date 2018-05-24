@extends('partials.master')

@section('content-main')
	@section('content-main')
		@include('errors.403-content')
	@endsection
	<section class="layout-square-default spacing-default">
		<h1>{{ __('errors.403.heading') }}</h1>
		<p>{{ __('errors.403.text') }}</p>
	</section>
@endsection
