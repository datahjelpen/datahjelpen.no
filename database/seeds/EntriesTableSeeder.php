<?php

use Illuminate\Database\Seeder;
use App\Entry;
use App\EntryCategory;
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

    }
}
