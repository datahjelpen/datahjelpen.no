<form method="POST" action="{{ route('entry_type.destroy', $entry_type) }}">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}

	<h1>{{ __('forms.confirm.delete.ask', ['name' => $entry_type->name]) }}</h1>
	<button type="button" autofocus>{{ __('forms.confirm.delete.no') }}</button>
	<button type="submit">{{ __('forms.confirm.delete.yes') }}</button>
</form>
