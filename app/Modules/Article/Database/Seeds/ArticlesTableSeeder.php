<?php

namespace App\Modules\Article\Database\Seeds;

use App\Modules\News\Models\Article;
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
            'user_id'               => 1,
            'author_id'             => 1,
            'title'                 => 'makale1',
            'slug'                  => 'makale1',
            'subtitle'              => 'makale1',
            'spot'                  => 'makale1',
            'content'               => 'makale1',
            'description'           => 'makale1',
            'keywords'              => 'makale1',
            'hit'                   => 1,
            'order'                 => 1,
            'status'                => 0,
            'is_cuff'               => 1,
            'is_active'             => 1,
        ]);

        Article::create([
            'user_id'               => 1,
            'author_id'             => 1,
            'title'                 => 'makale2',
            'slug'                  => 'makale2',
            'subtitle'              => 'makale2',
            'spot'                  => 'makale2',
            'content'               => 'makale2',
            'description'           => 'makale2',
            'keywords'              => 'makale2',
            'hit'                   => 1,
            'order'                 => 1,
            'status'                => 1,
            'is_cuff'               => 1,
            'is_active'             => 1,
        ]);

        Article::create([
            'user_id'               => 1,
            'author_id'             => 1,
            'title'                 => 'makale3',
            'slug'                  => 'makale3',
            'subtitle'              => 'makale3',
            'spot'                  => 'makale3',
            'content'               => 'makale3',
            'description'           => 'makale3',
            'keywords'              => 'makale3',
            'hit'                   => 1,
            'order'                 => 1,
            'status'                => 1,
            'is_cuff'               => 1,
            'is_active'             => 1,
        ]);

        Article::create([
            'user_id'               => 1,
            'author_id'             => 1,
            'title'                 => 'makale4',
            'slug'                  => 'makale4',
            'subtitle'              => 'makale4',
            'spot'                  => 'makale4',
            'content'               => 'makale4',
            'description'           => 'makale4',
            'keywords'              => 'makale4',
            'hit'                   => 1,
            'order'                 => 1,
            'status'                => 0,
            'is_cuff'               => 1,
            'is_active'             => 1,
        ]);
    }
}