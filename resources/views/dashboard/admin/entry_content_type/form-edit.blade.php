<form method="POST" action="{{ route('entry_content_type.update', $entry_content_type) }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('dashboard.admin.entry_content_type.form-fields')

	<button type="submit">Lagre</button>
</form>
