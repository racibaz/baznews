<?php

namespace App\Modules\Book\Database\Seeds;

use App\Models\WidgetManager;
use Illuminate\Database\Seeder;

class BookWidgetManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $widget = WidgetManager::where('name','RecentBooks')->first();
        if(empty($widget))
        {
            WidgetManager::create([
                'name'          => 'RecentBooks',
                'slug'          => 'recent_books',
                'namespace'     => '\App\Modules\Book\Widgets\RecentBooks',
                'position'      => 2,
                'group'         => 'rightbar',
                'is_active'     => 1
            ]);
        }
    }
}
