@extends('partials.master')
@section('content-main')
	<header class="page-header">
		<div class="inner-wrapper">
			<h1><span style="font-weight: 900;">Datahjelpen</span> — Vi skaper de digitale opplevelsene folk elsker.</h1>
		</div>
		{{-- <img id="bg-graphic" src="/images/patterns/waves/waves-blue@2x.png"> --}}
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
					<i class="icon" data-feather="chevron-right"></i>
				</a> --}}
			</div>
			<div>
				<img src="/images/graphics/mockup-websites.png" alt="Nettsider - mockup">
			</div>
		</div>
	</section>
	<section id="projects" class="page-section">
		<div class="inner-wrapper">
			<h2>Utvalgte prosjekter</h2>
			@php
				$projects = [
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
			<ul class="projects">
				@foreach ($projects as $project)
					<li class="project">
						<div class="project-graphic" style="background-image: url('/images/projects/{{ $project['slug'] }}/project-image.jpg');">
							<img class="project-logo" src="/images/projects/{{ $project['slug'] }}/logo-{{ $project['logo'] }}.png" alt="{{ $project['name'] }} logo">
						</div>
						<h3 class="project-title">{{ $project['name'] }}</h3>
{{-- 						<ul class="project-categories">
							@foreach ($project['categories'] as $category)
								@php
									$category = $categories[$category];
								@endphp
								<li class="project-category">
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
