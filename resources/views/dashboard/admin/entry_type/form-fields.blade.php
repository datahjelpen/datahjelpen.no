<label for="">Name</label>
<input type="text" name="name" value="{{ old('name', isset($entry_type->name) ? $entry_type->name : null) }}" required>
<label for="">Slug</label>
<input type="text" name="slug" value="{{ old('slug', isset($entry_type->slug) ? $entry_type->slug : null) }}" required>
