<form method="POST" action="{{ route('entry_content_type.store') }}">
	{{ csrf_field() }}

	@include('dashboard.admin.entry_content_type.form-fields')

	<button type="submit">Lagre</button>
</form>
