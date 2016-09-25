<?php

namespace App\Modules\Book\Database\Seeds;

use App\Modules\Book\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'user_id'               => 1,
            'name'                  => 'kitap 1',
            'slug'                  => 'kitap slug',
            'link'                  => 'link',
            'thumbnail'             => 'thumbnail',
//            'photo',
//            'author',
//            'publisher',
//            'description',
//            'ISBN',
//            'release_date',
//            'number_of_print',
//            'skin_type',
//            'paper_type',
//            'size',
            'is_cuff'               => 1,
            'is_active'             => 1
        ]);
    }
}
