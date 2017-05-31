<?php

namespace App\Modules\Book\Database\Seeds;

use App\Modules\Book\Models\BookAuthor;
use Illuminate\Database\Seeder;

class BookAuthorSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookAuthor::create([
            'user_id' => 1,
            'name' => 'Tahir Olgun 1',
            'slug' => 'tahir-olgun-1',
            'thumbnail' => '1.png',
            'bio_note' => 'yazar tanımı',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookAuthor::create([
            'user_id' => 1,
            'name' => 'George Orwell 2',
            'slug' => 'george-orwell-2',
            'thumbnail' => '2.png',
            'bio_note' => 'yazar tanımı',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookAuthor::create([
            'user_id' => 1,
            'name' => 'Selman Kayabaşı 3',
            'slug' => 'selman-kayabasi-3',
            'thumbnail' => '3.png',
            'bio_note' => 'yazar tanımı',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookAuthor::create([
            'user_id' => 1,
            'name' => 'Yavuz Bahadıroğlu 4',
            'slug' => 'yavuz-bahadiroglu-4',
            'thumbnail' => '4.png',
            'bio_note' => 'yazar tanımı',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);
    }
}