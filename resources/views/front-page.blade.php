@extends('partials.master')
@section('content-main')
	<header class="page-header">
		<div class="inner-wrapper">
    	<h1>Datahjelpen — Vi skaper de digitale opplevelsene som folk elsker.</h1>
  	</div>
    <img id="bg-graphic" src="/images/patterns/waves/waves-black@2x.png">
	</header>
	<section id="services" class="page-section">
		<div class="inner-wrapper">
			<div>
				<h2>Våre tjenester</h2>
				<ul>
					<li><a href="#">Nettsider</a></li>
					<li><a href="#">Apps</a></li>
					<li><a href="#">Sikkerhet</a></li>
					<li><a href="#">Analyser</a></li>
					<li><a href="#">SEO</a></li>
				</ul>{{--
				<a class="button" href="#">
					<span>Tjenester</span>
					<i class="icon" data-feather="arrow-right"></i>
				</a> --}}
			</div>
			<div>
				<img src="/images/graphics/mockup-websites.png" alt="Nettsider - mockup">
			</div>
		</div>
	</section>
	<section id="references" class="page-section">
		<div class="inner-wrapper">
			<h2>Referanser</h2>
			@php
				$references = [
					[
						'name' => 'Bewa.no',
						'slug' => 'bewa.no',
						'logo' => 'light',
						'categories' => [
							'website',
							'branding'
						]
					],
					[
						'name' => 'Takshop.no',
						'slug' => 'takshop.no',
						'logo' => 'light',
						'categories' => [
							'website',
							'branding'
						]
					],
					[
						'name' => 'Loax.no',
						'slug' => 'loax.no',
						'logo' => 'light',
						'categories' => [
							'website',
							'branding'
						]
					]
				];

				$categories = [
					'website' => [
						'name' => 'Nettside',
						'icon' => 'globe',
					],
					'branding' => [
						'name' => 'Profilering',
						'icon' => 'brush',
					]
				];
			@endphp
			<ul class="references">
				@foreach ($references as $reference)
					<li class="reference">
						<div class="reference-graphic" style="background-image: url('/images/projects/{{ $reference['slug'] }}/project-image.jpg');">
							<img class="reference-logo" src="/images/projects/{{ $reference['slug'] }}/logo-{{ $reference['logo'] }}.png" alt="{{ $reference['name'] }} logo">
						</div>
						<h3 class="reference-title">{{ $reference['name'] }}</h3>
{{-- 						<ul class="reference-categories">
							@foreach ($reference['categories'] as $category)
								@php
									$category = $categories[$category];
								@endphp
								<li class="reference-category">
									<a href="#">
										<span>{{ $category['name'] }}</span>
										<i class="icon" data-feather="{{ $category['icon'] }}"></i>
									</a>
								</li>
							@endforeach
						</ul> --}}
					</li>
				@endforeach
			</ul>
		</div>
	</section>
@endsection
