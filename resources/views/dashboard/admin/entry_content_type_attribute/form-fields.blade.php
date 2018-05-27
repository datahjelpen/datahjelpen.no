<label for="">name</label>
<input type="text" name="name" value="{{ old('name', isset($entry_content_type_attribute->name) ? $entry_content_type_attribute->name : null) }}" required>

<label for="">html_attribute</label>
<input type="text" name="html_attribute" value="{{ old('html_attribute', isset($entry_content_type_attribute->html_attribute) ? $entry_content_type_attribute->html_attribute : null) }}" required>

<label for="">required</label>
<input type="text" name="required" value="{{ old('required', isset($entry_content_type_attribute->required) ? $entry_content_type_attribute->required : null) }}" required>
