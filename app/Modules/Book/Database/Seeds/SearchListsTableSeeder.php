<?php

namespace App\Modules\Book\Database\Seeds;

use App\Models\SearchList;
use App\Modules\Book\Models\Book;
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
            'class_path' => Book::class,
            'field' => 'name',
            'module_slug' => 'book',
            'route_name' => 'book',
            'is_require_slug' => 1,
            'is_active' => 1
        ]);
    }
}
