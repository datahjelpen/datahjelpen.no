<p>Velg en content type:</p>
{{-- <ul>
	@foreach ($entry_content_types as $entry_content_type)
		<li><pre>{{ var_dump($entry_content_type->html_attributes()) }}</pre></li>
		{{ dd($entry_content_type->html_attributes) }}
	@endforeach

</ul> --}}

<select name="entry_content_type" id="entry_content_type">
	@foreach ($entry_content_types as $entry_content_type)
		<option value="{{ $entry_content_type->id }}">{{ $entry_content_type->name }}</option>
	@endforeach
</select>

<div id="append_loc"></div>

<script>
	(function() {
		var appendLoc = document.querySelector('#append_loc');
		var selectField = document.querySelector('#entry_content_type');
		getEntryContentType(selectField.value)
		selectField.onchange = function() {
			getEntryContentType(selectField.value)
		}

		function getEntryContentType(id) {
			var postURL = '{{ route('entry_content_type.show', '?id') }}';
			postURL = postURL.replace('?id', id);

			var xhr = new XMLHttpRequest();
			xhr.open('GET', postURL);
			xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

			xhr.onreadystatechange = function() {
				if (xhr.readyState > 3 && xhr.status == 200) {
					createAttributeFields(JSON.parse(xhr.responseText));
				}
			};

			xhr.send()
		}

		function createAttributeFields(entryContentType) {
			console.log(entryContentType);
			var wrapper = document.createElement('div');

			if (entryContentType.html_attributes.length > 0) {
				var start = document.createTextNode('<'+entryContentType.html_tag_open);
				var end = document.createTextNode('></'+entryContentType.html_tag_close+'>');
				wrapper.appendChild(start);

				for (var i = 0; i < entryContentType.html_attributes.length; i++) {
					var inputLabelStart = document.createTextNode(' '+entryContentType.html_attributes[i].html_attribute+'=\"');
					var inputLabelEnd = document.createTextNode('\"');

					var input = document.createElement('input');
					input.setAttribute('placeholder', entryContentType.html_attributes[i].name);
					input.setAttribute('name', entryContentType.html_attributes[i].html_attribute);

					wrapper.appendChild(inputLabelStart);
					wrapper.appendChild(input);
					wrapper.appendChild(inputLabelEnd);
				}
			} else {
				var start = document.createTextNode('<'+entryContentType.html_tag_open+'>');
				var end = document.createTextNode('</'+entryContentType.html_tag_close+'>');
				wrapper.appendChild(start);
			}

			wrapper.appendChild(end);

			appendLoc.appendChild(wrapper);
		}
	})();
</script>


{{-- {{ $entry_content_types->output() }} --}}

<p>Meta:</p>
<label for="">order</label>
<input type="number" name="order" value="{{ old('order', isset($entry_content->order) ? $entry_content->order : null) }}" required>
<br>

<label for="">css_id</label>
<input type="text" name="css_id" value="{{ old('css_id', isset($entry_content->css_id) ? $entry_content->css_id : null) }}">
<br>

<label for="">css_classlist</label>
<input type="text" name="css_classlist" value="{{ old('css_classlist', isset($entry_content->css_classlist) ? $entry_content->css_classlist : null) }}">
<br>

<label for="">html_content</label>
<textarea type="text" name="html_content">{{ old('html_content', isset($entry_content->html_content) ? $entry_content->html_content : null) }}</textarea>

<div id="entry_content_attributes"></div>
