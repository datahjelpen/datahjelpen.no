@include('partials.head')
@php
	$body_class = str_replace('/', '-', Request::path());

	if ($body_class == '-')    $body_class = 'front-page';
	if ($body_class == 'home') $body_class = 'front-page';
	if ($body_class == 'hjem') $body_class = 'front-page';
@endphp
<body class="{{ $body_class }}">
    @include('partials.flash-messages')

    @include('partials.navigation')

    @include('partials.main')

    @include('partials.footer')
</body>
</html>
