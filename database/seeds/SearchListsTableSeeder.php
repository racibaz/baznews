<?php

use App\Models\Page;
use App\Models\SearchList;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class SearchListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SearchList::create([
            'class_path' => Page::class,
            'field' => 'name',
            'module_slug' => 'core',
            'route_name' => 'page',
            'is_require_slug' => 1,
            'is_active' => 1
        ]);

        SearchList::create([
            'class_path' => Tag::class,
            'field' => 'name',
            'module_slug' => 'core',
            'route_name' => 'tag',
            'is_require_slug' => 1,
            'is_active' => 1
        ]);
    }
}
