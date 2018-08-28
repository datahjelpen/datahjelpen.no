<?php

use Illuminate\Database\Seeder;

use App\Entry;
use App\EntryType;

use App\EntryCategory;

use App\EntryContent;
use App\EntryContentAttribute;

use App\EntryContentType;
use App\EntryContentTypeAttribute;


use Carbon\Carbon;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entry_types = [
            'Tjenester',
            'Referanser',
        ];

        foreach ($entry_types as $entry_type) {
            $entry_type = EntryType::create([
                'slug' => str_slug($entry_type),
                'name' => $entry_type
            ]);
        }

        // Makes a tag
        $entry_content_type = EntryContentType::create([
            'name' => 'My test EntryContentType',
            'css_id' => 'my-test-entry_content_type',
            'css_classlist' => 'css-class-4 css-class-5 css-class-6',
            'html_tag_open' => 'div',
            'html_tag_close' => 'div'
        ]);

        // Makes an attribute
        $entry_content_type_attribute = EntryContentTypeAttribute::create([
            'name' => 'My test EntryContentTypeAttribute',
            'html_attribute' => 'test-attribute',
            'required' => true,
            'entry_content_type_id' => $entry_content_type->id,
        ]);

        // Makes an entry
        $entry = Entry::create([
            'name' => 'Test entry',
            'css_id' => 'my-test-entry',
            'css_classlist' => 'css-class-1 css-class-2 css-class-3',
            'entry_type_id' => 1,
            'author_id' => 1
        ]);

        // Adds a piece of content of a certian type to the entry
        $entry_content = EntryContent::create([
            'order' => 1,
            'css_id' => 'my-test-entry_content',
            'css_classlist' => 'css-class-7 css-class-8 css-class-9',
            'html_content' => '',
            'entry_id' => $entry->id,
            'entry_content_type_id' => $entry_content_type->id,
        ]);

        // Adds a value to a tag attribute
        $entry_content_attribute = EntryContentAttribute::create([
            'value' => 'My test attribute value',
            'entry_content_id' => $entry_content->id,
            'entry_content_type_attribute_id' => $entry_content_type_attribute->id,
            // 'entry_id' => '',
            // 'image_id' => '',
        ]);
    }
}
