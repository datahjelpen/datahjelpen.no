<form method="POST" action="{{ route('entry.update', [$entry_type, $entry]) }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('dashboard.author.entry.form-fields')

	<button type="submit">Lagre</button>
</form>
