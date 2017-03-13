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
//                'widget_group_id' => 4,
                'name'          => 'RecentBooks',
                'slug'          => 'recent_books',
                'module_name'   => 'Book',
                'namespace'     => '\App\Modules\Book\Widgets\RecentBooks',
                'group'         => 'right_bar',
                'position'      => 2,
                'is_active'     => 1
            ]);
        }
    }
}
