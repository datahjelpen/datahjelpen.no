@extends('partials.master')
@section('content-main')
	<section class="page-section">
		<div class="inner-wrapper">
			<h1 class="page-title">Slett artikkelen: {{ $entry->title() }}?</h1>
			<form method="POST" action="{{ route('blog.delete', $entry) }}">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<div class="form-groups">
					<div class="form-group">
						<a class="button neutral" href="{{ route('blog.dashboard') }}"><i class="icon" data-feather="x-square"></i><span>Nei, avbryt</span></a>
					</div>
					<div class="form-group">
						<button type="submit" class="button primary"><i class="icon" data-feather="trash"></i><span>Ja, Slett</span></button>
					</div>
				</div>
			</form>
		</div>
	</section>
@endsection
