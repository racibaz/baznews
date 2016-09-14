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
        $this->call(PhotoGalleriesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);

    }
}
