<?php

namespace App\Modules\Article\Database\Seeds;

use App\Modules\Article\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'user_id' => 1,
            'article_author_id' => 1,
            'title' => 'makale 1',
            'slug' => 'makale-1',
            'subtitle' => 'makale1',
            'spot' => 'makale1',
            'content' => 'makale1',
            'description' => 'makale1',
            'keywords' => 'makale1',
            'order' => 1,
            'status' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Article::create([
            'user_id' => 1,
            'article_author_id' => 1,
            'title' => 'makale 2',
            'slug' => 'makale-2',
            'subtitle' => 'makale2',
            'spot' => 'makale2',
            'content' => 'makale2',
            'description' => 'makale2',
            'keywords' => 'makale2',
            'order' => 1,
            'status' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Article::create([
            'user_id' => 1,
            'article_author_id' => 1,
            'title' => 'makale 3',
            'slug' => 'makale-3',
            'subtitle' => 'makale3',
            'spot' => 'makale3',
            'content' => 'makale3',
            'description' => 'makale3',
            'keywords' => 'makale3',
            'order' => 1,
            'status' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Article::create([
            'user_id' => 1,
            'article_author_id' => 1,
            'title' => 'makale 4',
            'slug' => 'makale-4',
            'subtitle' => 'makale4',
            'spot' => 'makale4',
            'content' => 'makale4',
            'description' => 'makale4',
            'keywords' => 'makale4',
            'order' => 1,
            'status' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_active' => 1,
        ]);
    }
}