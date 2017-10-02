<?php

namespace App\Modules\Article\Database\Seeds;

use App\Models\SearchList;
use App\Modules\Article\Models\Article;
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
            'class_path' => Article::class,
            'field' => 'title',
            'module_slug' => 'article',
            'route_name' => 'article',
            'is_require_slug' => 1,
            'is_active' => 1
        ]);
    }
}
