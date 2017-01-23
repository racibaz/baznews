<?php

namespace App\Modules\News\Database\Seeds;

use App\Models\Setting;
use WidgetManagersTableSeeder;
use Illuminate\Database\Seeder;

class NewsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NewsSourceTableSeeder::class);
        $this->call(NewsCategoriesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(PhotoCategoriesTableSeeder::class);
        $this->call(PhotoGalleriesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(VideoCategoriesTableSeeder::class);
        $this->call(VideoGalleriesTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(FutureNewsTableSeeder::class);
        $this->call(RecommendationNewsTableSeeder::class);
        $this->call(RelationsTableSeeder::class);
        $this->call(NewsWidgetManagerTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);


        $setting = Setting::where('attribute_key','break_news')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'break_news',
                'attribute_value'             => '5',
            ]);
        }

        $setting = Setting::where('attribute_key','band_news')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'band_news',
                'attribute_value'             => '5',
            ]);
        }

        $setting = Setting::where('attribute_key','box_cuff')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'box_cuff',
                'attribute_value'             => '20',
            ]);
        }

        $setting = Setting::where('attribute_key','main_cuff')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'main_cuff',
                'attribute_value'             => '20',
            ]);
        }

        $setting = Setting::where('attribute_key','mini_cuff')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'mini_cuff',
                'attribute_value'             => '10',
            ]);
        }

        $setting = Setting::where('attribute_key','find_tags_in_content')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'find_tags_in_content',
                'attribute_value'             => "1",
                'is_active'                   => 1
            ]);
        }

        $setting = Setting::where('attribute_key','automatic_add_tags')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'automatic_add_tags',
                'attribute_value'             => "1",
                'is_active'                   => 1
            ]);
        }

        $setting = Setting::where('attribute_key','is_show_editor_profile_in_news')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'is_show_editor_profile_in_news',
                'attribute_value'             => "1",
                'is_active'                   => 1
            ]);
        }


    }
}
