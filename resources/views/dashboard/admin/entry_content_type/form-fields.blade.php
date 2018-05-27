<label for="">name</label>
<input type="text" name="name" value="{{ old('name', isset($entry_content_type->name) ? $entry_content_type->name : null) }}" required>

<label for="">icon</label>
<input type="text" name="icon" value="{{ old('icon', isset($entry_content_type->icon) ? $entry_content_type->icon : null) }}">

<label for="">css_classlist</label>
<input type="text" name="css_classlist" value="{{ old('css_classlist', isset($entry_content_type->css_classlist) ? $entry_content_type->css_classlist : null) }}">

<label for="">html_tag_open</label>
<input type="text" name="html_tag_open" value="{{ old('html_tag_open', isset($entry_content_type->html_tag_open) ? $entry_content_type->html_tag_open : null) }}" required>

<label for="">html_tag_close</label>
<input type="text" name="html_tag_close" value="{{ old('html_tag_close', isset($entry_content_type->html_tag_close) ? $entry_content_type->html_tag_close : null) }}">






