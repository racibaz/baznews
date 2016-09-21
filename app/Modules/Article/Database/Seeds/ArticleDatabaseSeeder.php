<?php

namespace App\Modules\Article\Database\Seeds;

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
    }
}
