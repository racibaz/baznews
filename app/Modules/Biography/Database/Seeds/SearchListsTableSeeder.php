<?php

namespace App\Modules\Biography\Database\Seeds;

use App\Models\SearchList;
use App\Modules\Biography\Models\Biography;
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
            'class_path' => Biography::class,
            'field' => 'title',
            'module_slug' => 'biography',
            'route_name' => 'biography',
            'is_require_slug' => 1,
            'is_active' => 1
        ]);
    }
}
