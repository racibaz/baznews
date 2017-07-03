<?php

namespace App\Modules\Article\Database\Seeds;

use App\Modules\Article\Models\ArticleCategory;
use Illuminate\Database\Seeder;

class ArticleCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Dünya makalesi',
            'slug' => 'dunya_makalesi',
            'description' => 'Dünya makalesivs..',
            'keywords' => 'keywords',
            'hit' => 1,
            'icon' => 'icon path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);
    }
}
