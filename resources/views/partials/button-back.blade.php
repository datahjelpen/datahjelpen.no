@if (isset($button_back_url))
	<a href="{{ $button_back_url }}"><- {{ isset($button_back_title) ? $button_back_title : '<- Tilbake' }}</a>
@else
	<button onclick="window.history.back()"><- Tilbake</button>
@endif
