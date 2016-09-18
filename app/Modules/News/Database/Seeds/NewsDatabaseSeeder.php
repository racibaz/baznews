<?php

namespace App\Modules\News\Database\Seeds;

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
        $this->call(BiographiesTableSeeder::class);
        $this->call(RelationsTableSeeder::class);
    }
}
