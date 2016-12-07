<?php

namespace App\Modules\Biography\Database\Seeds;

use App\Models\Setting;
use WidgetManagersTableSeeder;
use Illuminate\Database\Seeder;

class BiographyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BiographiesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);


//        $setting = Setting::where('attribute_key','break_news')->first();
//        if(empty($setting))
//        {
//            Setting::create([
//                'attribute_key'               => 'break_news',
//                'attribute_value'             => '5',
//            ]);
//        }


    }
}
