<article class="entry entry-{{ $loop->iteration }}" itemscope itemtype="http://schema.org/Article">
	<a class="entry-image" href="{{ route('blog.show', $entry->name) }}">
		<img itemprop="image" src="{{ $entry->image_overview() }}">
	</a>
	<div class="entry-content-wrapper">
		<h3 itemprop="headline" class="entry-title"><a href="{{ route('blog.show', $entry->name) }}">{{ $entry->title_overview() }}</a></h3>
		<p class="entry-excerpt">{{ substr($entry->excerpt(), 0, 120) }}</p>
	</div>
</article>
