<label for="">name</label>
<input type="text" name="name" value="{{ old('name', isset($entry->name) ? $entry->name : null) }}" required>
<label for="">css_id</label>
<input type="text" name="css_id" value="{{ old('css_id', isset($entry->css_id) ? $entry->css_id : null) }}">
<label for="">css_classlist</label>
<input type="text" name="css_classlist" value="{{ old('css_classlist', isset($entry->css_classlist) ? $entry->css_classlist : null) }}">
