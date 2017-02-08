<?php

use App\Models\WidgetGroup;
use Illuminate\Database\Seeder;

class WidgetGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetGroup::create([
            'name' => 'home_page_header',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'home_page_side_bar',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'home_page_center',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'home_page_right_bar',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'home_page_footer',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'home_page_fixed_footer',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'page_header',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'page_side_bar',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'page_center',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'page_right_bar',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'page_footer',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'page_fixed_footer',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'contact_header',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'contact_side_bar',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'contact_center',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'contact_right_bar',
            'is_active' => 1
        ]);


        WidgetGroup::create([
            'name' => 'contact_footer',
            'is_active' => 1
        ]);

        WidgetGroup::create([
            'name' => 'contact_fixed_footer',
            'is_active' => 1
        ]);

    }
}
