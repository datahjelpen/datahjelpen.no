<form method="POST" action="{{ route('entry.store', $entry_type) }}">
	{{ csrf_field() }}

	@include('dashboard.author.entry.form-fields')

	<button type="submit">Lagre</button>
</form>
