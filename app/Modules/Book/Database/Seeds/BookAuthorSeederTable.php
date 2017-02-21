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
            'name' => 'Tahir Olgun',
            'slug' => 'tahir-olgun',
            'link' => 'www.receptayyiperdogan.name',
            'thumbnail' => 'thumbnail',
            'bio_note' => 'yazar tanımı',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookAuthor::create([
            'user_id' => 1,
            'name' => 'Yazar 2',
            'slug' => 'yazar-2',
            'link' => 'www.receptayyiperdogan.name',
            'thumbnail' => 'thumbnail',
            'bio_note' => 'yazar tanımı',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookAuthor::create([
            'user_id' => 1,
            'name' => 'Yazar 3',
            'slug' => 'yazar-3',
            'link' => 'www.receptayyiperdogan.name',
            'thumbnail' => 'thumbnail',
            'bio_note' => 'yazar tanımı',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookAuthor::create([
            'user_id' => 1,
            'name' => 'Yazar 4',
            'slug' => 'yazar-4',
            'link' => 'www.receptayyiperdogan.name',
            'thumbnail' => 'thumbnail',
            'bio_note' => 'yazar tanımı',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);
    }
}