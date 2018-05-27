<form method="POST" action="{{ route('entry_content_type_attribute.store', $entry_content_type) }}">
	{{ csrf_field() }}

	@include('dashboard.admin.entry_content_type_attribute.form-fields')

	<button type="submit">Lagre</button>
</form>
