<?php

namespace App\Modules\News\Database\Seeds;

use App\Models\SearchList;
use App\Modules\News\Models\News;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\Video;
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
            'class_path' => News::class,
            'field' => 'title',
            'module_slug' => 'news',
            'route_name' => 'show_news',
            'is_require_slug' => 1,
            'is_active' => 1
        ]);

        SearchList::create([
            'class_path' => Video::class,
            'field' => 'name',
            'module_slug' => 'news',
            'route_name' => 'show_videos',
            'is_require_slug' => 1,
            'is_active' => 1
        ]);

        SearchList::create([
            'class_path' => Photo::class,
            'field' => 'name',
            'module_slug' => 'news',
            'route_name' => 'show_photo',
            'is_require_slug' => 1,
            'is_active' => 1
        ]);
    }
}
