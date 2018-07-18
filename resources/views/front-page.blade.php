@extends('partials.master')
@section('content-main')
	<header class="page-header">
		<div class="inner-wrapper">
    	<h1>Datahjelpen</h1>
    	<p>Vi er et kreativt teknologibyrå, fokusert på å hjelpe selskaper skille seg ut i den digitale verden.</p>
  	</div>
	</header>
	<section id="services" class="page-section">
		<div class="inner-wrapper">
			<h2>Våre tjenester — Digitale opplevelser som folk elsker</h2>
			<ul>
				<li><a href="#">Nettsider</a></li>
				<li><a href="#">Apps</a></li>
				<li><a href="#">Sikkerhet</a></li>
				<li><a href="#">Analyser</a></li>
				<li><a href="#">SEO</a></li>
			</ul>
			<a class="button" href="#">
				<span>Tjenester</span>
				<i class="icon" data-feather="arrow-right"></i>
			</a>
		</div>
	</section>
	<section id="references" class="page-section">
		<div class="inner-wrapper">
			<h2>Referanser</h2>
			<ul class="references">
				<li class="reference">
					<img src="#" alt="bilde">
					<h3>Takshop.no</h3>
					<ul class="reference-categories">
						<li>
							<a href="#">
								<span>Kategori 1</span>
								<i class="icon" data-feather="brush"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<span>Kategori 2</span>
								<i class="icon" data-feather="feather"></i>
							</a>
						</li>
					</ul>
					<a href="#">Link</a>
				</li>
				<li class="reference">
					<img src="#" alt="bilde">
					<h3>Bewa.no</h3>
					<ul class="reference-categories">
						<li>
							<a href="#">
								<span>Kategori 1</span>
								<i class="icon" data-feather="brush"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<span>Kategori 2</span>
								<i class="icon" data-feather="feather"></i>
							</a>
						</li>
					</ul>
					<a href="#">Link</a>
				</li>
				<li class="reference">
					<img src="#" alt="bilde">
					<h3>Loax.no</h3>
					<ul class="reference-categories">
						<li>
							<a href="#">
								<span>Kategori 1</span>
								<i class="icon" data-feather="brush"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<span>Kategori 2</span>
								<i class="icon" data-feather="feather"></i>
							</a>
						</li>
					</ul>
					<a href="#">Link</a>
				</li>
			</ul>
		</div>
	</section>
@endsection
