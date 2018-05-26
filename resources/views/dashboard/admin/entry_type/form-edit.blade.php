<form method="POST" action="{{ route('entry_type.update', $entry_type) }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('dashboard.admin.entry_type.form-fields')

	<button type="submit">Lagre</button>
</form>
