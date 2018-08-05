<?php

use Illuminate\Database\Seeder;
use App\Entry;
use App\EntryCategory;
use App\EntryContentType;
use App\EntryType;
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
        $entry_types = ['Tjenester', 'Referanser', 'Post', 'Draft'];
        foreach ($entry_types as $entry_type) {
            $entry_type = EntryType::create([
                'slug' => str_slug($entry_type),
                'name' => $entry_type
            ]);
        }

        EntryCategory::create(['name' => 'Generelt', 'slug' => 'generelt']);

        EntryContentType::create(['name' => 'blog-title', 'icon' => null, 'css_classlist' => null, 'html_tag_open' => '', 'html_tag_close' => '']);
        EntryContentType::create(['name' => 'blog-title-overview', 'icon' => null, 'css_classlist' => null, 'html_tag_open' => '', 'html_tag_close' => '']);
        EntryContentType::create(['name' => 'blog-content', 'icon' => null, 'css_classlist' => null, 'html_tag_open' => '', 'html_tag_close' => '']);
        EntryContentType::create(['name' => 'blog-excerpt', 'icon' => null, 'css_classlist' => null, 'html_tag_open' => '', 'html_tag_close' => '']);
        EntryContentType::create(['name' => 'blog-image-header', 'icon' => null, 'css_classlist' => null, 'html_tag_open' => '', 'html_tag_close' => '']);
        EntryContentType::create(['name' => 'blog-image-overview', 'icon' => null, 'css_classlist' => null, 'html_tag_open' => '', 'html_tag_close' => '']);
        EntryContentType::create(['name' => 'blog-image-alt', 'icon' => null, 'css_classlist' => null, 'html_tag_open' => '', 'html_tag_close' => '']);
    }
}
