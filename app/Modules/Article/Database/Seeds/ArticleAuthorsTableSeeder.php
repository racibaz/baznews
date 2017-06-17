<?php

namespace App\Modules\Article\Database\Seeds;

use App\Modules\Article\Models\ArticleAuthor;
use Illuminate\Database\Seeder;

class ArticleAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleAuthor::create([
            'user_id'                   => 1,
            'name'                      => 'alınto yazar 1',
            'photo'                     => '1.png',
            'is_quotation'              => 1,
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        ArticleAuthor::create([
            'user_id'                   => 1,
            'name'                      => 'alınto yazar 2',
            'photo'                     => '2.png',
            'is_quotation'              => 1,
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        ArticleAuthor::create([
            'user_id'                   => 1,
            'name'                      => 'alınto yazar 3',
            'photo'                     => '3.png',
            'is_quotation'              => 1,
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);
    }
}