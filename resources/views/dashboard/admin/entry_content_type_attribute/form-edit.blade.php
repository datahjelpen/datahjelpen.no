<form method="POST" action="{{ route('entry_content_type_attribute.update', [$entry_content_type, $entry_content_type_attribute]) }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('dashboard.admin.entry_content_type_attribute.form-fields')

	<button type="submit">Lagre</button>
</form>
