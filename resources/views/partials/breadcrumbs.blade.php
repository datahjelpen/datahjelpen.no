@php
	$breadcrumbs_count = count($breadcrumbs);
@endphp
@if ($breadcrumbs_count)
	<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
		@if ($breadcrumbs_count == 2)
			@php
				$button_back_url = $breadcrumbs->first()->url;
				$button_back_title = $breadcrumbs->first()->title;
			@endphp
			@include('partials.button-back')
		@elseif ($breadcrumbs_count > 2)
			@foreach ($breadcrumbs as $breadcrumb)
				<li class="breadcrumb-item{{ $loop->last ? ' breadcrumb-item-last' : null }}" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					@if ($breadcrumb->url)
						<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="{{ $breadcrumb->url }}">
							<span itemprop="name">{{ $breadcrumb->title }}</span>
							{{-- <img itemprop="image" src="http://example.com/images/icon-bookicon.png" alt="Books"/> --}}
						</a>
					@endif
					<meta itemprop="position" content="{{ $loop->iteration }}"/>
				</li>
			@endforeach
		@endif
	</ol>
@endif
