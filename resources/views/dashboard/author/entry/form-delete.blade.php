<form method="POST" action="{{ route('entry.destroy', [$entry_type, $entry]) }}">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}

	<h1>{{ __('forms.confirm.delete.ask', ['name' => $entry->name]) }}</h1>
	<button type="button" autofocus>{{ __('forms.confirm.delete.no') }}</button>
	<button type="submit">{{ __('forms.confirm.delete.yes') }}</button>
</form>
