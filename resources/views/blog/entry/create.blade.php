@extends('partials.master')
@section('content-main')
	<link rel="stylesheet" href="{{ mix('/css/pell.css') }}">
	<article class="page-section article-main">
		<div class="inner-wrapper">
			<h1 id="article-title" contenteditable></h1>
			<div class="content-text" id="article-editor"></div>
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
					<input class="form-input" id="article-form-title" type="text" name="title" value="{{ old('name', isset($entry->name) ? $entry->name : 'Tittel') }}">
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-entry_type">Status</label>
					<select name="entry_type" id="article-form-entry_type" required>
						<option selected disabled>Velg en</option>
						<option value="post">Post</option>
						<option value="draft">Draft</option>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-category">Kategori</label>
					<select name="category" id="article-form-category" required>
						<option selected disabled>Velg en</option>
						<option value="post">Post</option>
						<option value="draft">Draft</option>
					</select>
				</div>
				<div class="form-group">
					<label class="form-label" for="article-form-content">Innhold</label>
					<textarea class="form-input" id="article-form-content" name="content" rows="10">{!! old('content', isset($entry->name) ? $entry->name : null) !!}</textarea>
				</div>
				<div class="form-groups">
					<div class="form-group"></div>
					<div class="form-group">
						<button id="article-save" type="submit" class="button primary">Lagre</button>
					</div>
				</div>
			</form>
			@if (isset($entry))
				<form method="POST" action="{{ route('blog.delete', $entry) }}">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<div class="form-group">
						<button type="submit" class="button neutral">Slett</button>
					</div>
				</form>
			@endif
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
			defaultParagraphSeparator: 'div',
			styleWithCSS: false,
		});

		let pellEditor = document.querySelector('#article-editor .pell-content');
		articleTitle.innerHTML = articleFormTitle.value;
		pellEditor.innerHTML = articleFormContent.value;
	</script>
@endsection
