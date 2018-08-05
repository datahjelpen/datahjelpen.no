@extends('partials.master')
@section('content-main')
	<link rel="stylesheet" href="{{ mix('/css/pell.css') }}">
	<article class="article-main">
		<figure class="article-header-image">
			@if (isset($entry))
				<img src="{{ $entry->image_header() }}" alt="{{ $entry->image_alt() }}">
				<figcaption>{{ $entry->image_alt() }}</figcaption>
			@endif
		</figure>
		<div class="inner-wrapper">
			<h1 id="article-title" class="article-title" contenteditable></h1>
			<p class="article-meta">
				@if (isset($entry))
					<span>{{ $entry->author->name }}</span>
					<span>—</span>
					<span title="{{ $entry->created_at->toDateTimeString() }} ({{ $entry->created_at->diffForHumans() }})">{{ $entry->date() }}</span>
				@else
					<span>{{ $current_user->name }}</span>
					<span>—</span>
					<span title="{{ Carbon\Carbon::now()->toDateTimeString() }} ({{ Carbon\Carbon::now()->diffForHumans() }})">{{ Carbon\Carbon::now()->toDateTimeString() }}</span>
				@endif
			</p>
			<div id="article-editor" class="article-body content-text"></div>
		</div>
	</article>
	<section class="page-section">
		<div class="inner-wrapper">
			@if (isset($entry))
				<form method="POST" action="{{ route('blog.update', $entry) }}">
					{{ method_field('PATCH') }}
			@else
				<form method="POST" action="{{ route('blog.store') }}">
			@endif
				{{ csrf_field() }}
				<div class="form-group">
					<label class="form-label" for="article-form-title">Tittel</label>
					<input class="form-input" id="article-form-title" type="text" name="title" required value="{{ old('name', isset($entry) ? $entry->title() : 'Tittel') }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-title_overview">Tittel (i oversikten)</label>
					<p>Denne brukes i oversikt og på Google. Om den er blank brukes vanlig tittel i stedet</p>
					<input class="form-input" id="article-form-title_overview" type="text" name="title_overview" value="{{ old('title_overview', isset($entry) ? $entry->title_overview() : null) }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-slug">Slug (url)</label>
					<p>Om denne er blank genereres det en automatisk</p>
					<input class="form-input" id="article-form-slug" type="text" name="slug" value="{{ old('slug', isset($entry) ? $entry->name : null) }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-image_header">Bilde (header)</label>
					<input class="form-input" id="article-form-image_header" type="text" name="image_header" value="{{ old('image_header', isset($entry) ? ($entry->image_header() == asset(config('app.image'))) ? null : $entry->image_header() : null) }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-image_alt">Bilde (alt tekst)</label>
					<input class="form-input" id="article-form-image_alt" type="text" name="image_alt" value="{{ old('image_alt', isset($entry) ? $entry->image_alt() : null) }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-image_overview">Bilde (oversikt)</label>
					<p>Denne brukes i oversikt og på Google. Om den er blank brukes bilde (header) i stedet</p>
					<input class="form-input" id="article-form-image_overview" type="text" name="image_overview" value="{{ old('image_overview', isset($entry) ? ($entry->image_overview() == asset(config('app.image'))) ? null : $entry->image_overview() : null) }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-entry_type">Status</label>
					<select name="entry_type" id="article-form-entry_type" required>
						<option selected disabled>Velg en</option>
						@foreach ($entry_types as $entry_type)
							@if (isset($entry) && $entry_type->id == $entry->entry_type->id)
								<option value="{{ $entry_type->id }}" selected>{{ $entry_type->name }}</option>
							@else
								<option value="{{ $entry_type->id }}">{{ $entry_type->name }}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-excerpt">Utdrag</label>
					<p>Dette brukes i oversikten og som utdrag til Google. Om man lar denne være blank så lager systemet automatisk utdrag fra de første ordene i teksten</p>
					@if (isset($entry) && $entry->excerptIsAuto)
						<textarea class="form-input" id="article-form-excerpt" name="excerpt" rows="5" maxlength="350" placeholder="Autogenerert: {{ isset($entry) ? $entry->excerpt() : null }}"></textarea>
					@else
						<textarea class="form-input" id="article-form-excerpt" name="excerpt" rows="5" maxlength="350">{{ old('excerpt', isset($entry) ? $entry->excerpt() : null) }}</textarea>
					@endif
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-css_id">CSS ID</label>
					<input class="form-input" id="article-form-css_id" type="text" name="css_id" value="{{ old('css_id', isset($entry) ? $entry->css_id : null) }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-css_classlist">CSS klasser</label>
					<p>Gi klasser til artikkelen for å style den (f.eks. article-header-image-box som gjør at header bilde holder seg innen for layout "boksen").</p>
					<p>Skill klasser med mellomrom.</p>
					<input class="form-input" id="article-form-css_classlist" type="text" name="css_classlist" value="{{ old('css_classlist', isset($entry) ? $entry->css_classlist : null) }}">
				</div>
				<div class="form-groups">
					<div class="form-group">
						@if (isset($entry))
							<a id="article-show" class="button neutral" href="{{ route('blog.show', str_slug($entry->name)) }}">
								<i class="icon" data-feather="eye"></i>
								<span>Vis</span>
							</a>
							<a class="button neutral" href="{{ route('blog.show', str_slug($entry->name)) }}">
								<i class="icon" data-feather="eye"></i>
								<span>Vis</span>
							</a>
							<div><br><br></div>
							<a class="button neutral" href="{{ route('blog.delete', $entry) }}">
								<i class="icon" data-feather="trash"></i>
								<span>Slett</span>
							</a>
						@endif
					</div>
					<div class="form-group">
						<button id="article-save" type="submit" class="button primary">
							<i class="icon" data-feather="save"></i>
							<span>Lagre</span>
						</button>
						<button type="submit" class="button primary">
							<i class="icon" data-feather="save"></i>
							<span>Lagre</span>
						</button>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-content">Innhold</label>
					<textarea class="form-input" id="article-form-content" name="content" rows="10" required>{!! old('content', isset($entry) ? $entry->content() : null) !!}</textarea>
				</div>
			</form>
		</div>
	</section>
	<script src="{{ mix('/js/texteditor.js') }}"></script>
	<script>
		let articleTitle = document.getElementById('article-title');
		let articleOutput = document.getElementById('article-form-content');
		let articleEditor = document.getElementById('article-editor');
		let articleFormTitle = document.getElementById('article-form-title');
		let articleFormContent = document.getElementById('article-form-content');

		articleTitle.addEventListener('input', () => {
			articleFormTitle.value = articleTitle.innerHTML
		});


		articleFormTitle.addEventListener('input', () => {
			articleTitle.innerHTML = articleFormTitle.value
		});

		articleFormContent.addEventListener('input', () => {
			pellEditor.innerHTML = articleFormContent.value
		});

		window.pell.init({
			element: articleEditor,
			onChange: html => articleOutput.value = html,
			defaultParagraphSeparator: 'p',
			styleWithCSS: false,
		});

		let pellEditor = document.querySelector('#article-editor .pell-content');
		articleTitle.innerHTML = articleFormTitle.value;
		pellEditor.innerHTML = articleFormContent.value;

		if (pellEditor.innerHTML.length == 0) {
			pellEditor.innerHTML = '<p>Tekst her ...</p>';

			pellEditor.addEventListener('focus', function handler() {
				pellEditor.innerHTML = articleFormContent.value;
				this.removeEventListener('focus', handler);;
			});
		}

		pellEditor.addEventListener('blur', function handler() {
			if (pellEditor.innerHTML.length == 0) {
				pellEditor.innerHTML = '<p>Tekst her ...</p>';

				pellEditor.addEventListener('focus', function handler() {
					pellEditor.innerHTML = articleFormContent.value;
					this.removeEventListener('focus', handler);;
				});
			}
		});

		articleTitle.addEventListener('keypress', (event) => {
			if (event.which == 13 || event.keyCode == 13) {
				event.preventDefault();
				pellEditor.focus();
			}
		});

		let pellActionbar = document.querySelector('.pell-actionbar');
		document.body.style.marginTop = pellActionbar.scrollHeight + 'px';
	</script>
@endsection
