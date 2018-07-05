<form method="POST" action="{{ route('entry_content.store', [$entry_type, $entry]) }}">
	{{ csrf_field() }}

	@include('dashboard.author.entry_content.form-fields')

	<button type="submit">Lagre</button>
</form>
