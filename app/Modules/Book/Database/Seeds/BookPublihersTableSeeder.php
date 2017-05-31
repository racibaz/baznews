<?php

namespace App\Modules\Book\Database\Seeds;

use App\Modules\Book\Models\BookPublisher;
use Illuminate\Database\Seeder;

class BookPublihersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookPublisher::create([
            'user_id' => 1,
            'name' => 'Timaş Yayınları',
            'link' => 'http://www.example.com',
            'description' => 'firma tanımı',
            'is_active' => 1,
        ]);

        BookPublisher::create([
            'user_id' => 1,
            'name' => 'Yayın Evi 2',
            'link' => 'http://www.example.com',
            'description' => 'firma tanımı',
            'is_active' => 1,
        ]);

        BookPublisher::create([
            'user_id' => 1,
            'name' => 'Yayın Evi 3',
            'link' => 'http://www.example.com',
            'description' => 'firma tanımı',
            'is_active' => 1,
        ]);

        BookPublisher::create([
            'user_id' => 1,
            'name' => 'Yayın Evi 4',
            'link' => 'http://www.example.com',
            'description' => 'firma tanımı',
            'is_active' => 1,
        ]);
    }
}