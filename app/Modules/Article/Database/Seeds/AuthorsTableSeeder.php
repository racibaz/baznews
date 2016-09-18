<?php

namespace App\Modules\Article\Database\Seeds;

use App\Modules\News\Models\Author;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'user_id'                   => 1,
            'name'                      => 'alınto yazar 1',
            'is_quotation'              => 1,
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        Author::create([
            'user_id'                   => 1,
            'name'                      => 'alınto yazar 2',
            'is_quotation'              => 1,
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        Author::create([
            'user_id'                   => 1,
            'name'                      => 'alınto yazar 3',
            'is_quotation'              => 1,
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);
    }
}