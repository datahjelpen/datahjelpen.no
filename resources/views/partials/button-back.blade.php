@if (isset($button_back_url))
	<a class="button" href="{{ $button_back_url }}"><i class="icon" data-feather="arrow-left"></i><span>{{ isset($button_back_title) ? $button_back_title : 'Tilbake' }}</span></a>
@else
	<button onclick="window.history.back()"><i class="icon" data-feather="arrow-left"></i><span>Tilbake</span></button>
@endif
