<h1>{{ $subject }}</h1>
<ul>
	@foreach ($fields as $key => $value)
		<li><strong>{{ $key }}</strong>: {{ $value }}</li>
	@endforeach
</ul>
