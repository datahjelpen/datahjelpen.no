@include('partials.head')
@php
	$body_class = str_replace('/', '-', Request::path());

	if ($body_class == '-')    $body_class = 'front-page';
	if ($body_class == 'home') $body_class = 'front-page';
	if ($body_class == 'hjem') $body_class = 'front-page';

	if (!isset($body_id)) {
		$body_id = '';
	} else {
		$body_id = 'id=' . $body_id;
	}

	if (!isset($body_class_extra)) {
		$body_class_extra = '';
	} else {
		$body_class .= ' ' . $body_class_extra;
	}
@endphp
<body {{ $body_id }} class="{{ $body_class }}">
    @include('partials.flash-messages')

    @include('partials.navigation')

    @include('partials.main')

    @include('partials.footer')
</body>
</html>
