<form method="POST" action="{{ route('entry_content_type_attribute.destroy', [$entry_content_type, $entry_content_type_attribute]) }}">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}

	<h1>{{ __('forms.confirm.delete.ask', ['name' => $entry_content_type_attribute->name]) }}</h1>
	<button type="button" autofocus>{{ __('forms.confirm.delete.no') }}</button>
	<button type="submit">{{ __('forms.confirm.delete.yes') }}</button>
</form>
