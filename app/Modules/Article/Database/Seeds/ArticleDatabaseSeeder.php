<?php

namespace App\Modules\Article\Database\Seeds;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class ArticleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticleCategoriesTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);



        $setting = Setting::where('attribute_key','article_count')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'article_count',
                'attribute_value'             => '5',
            ]);
        }

        $setting = Setting::where('attribute_key','author_count')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'author_count',
                'attribute_value'             => '5',
            ]);
        }
    }
}
