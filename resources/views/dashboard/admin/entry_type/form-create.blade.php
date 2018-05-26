<form method="POST" action="{{ route('entry_type.store') }}">
	{{ csrf_field() }}

	@include('dashboard.admin.entry_type.form-fields')

	<button type="submit">Lagre</button>
</form>
