<?php

namespace App\Modules\Book\Database\Seeds;

use App\Modules\Book\Models\Publisher;
use Illuminate\Database\Seeder;

class PublihersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create([
            'user_id' => 1,
            'name' => 'Timaş Yayınları',
            'link' => 'link',
            'description' => 'firma tanımı',
            'is_active' => 1,
        ]);

        Publisher::create([
            'user_id' => 1,
            'name' => 'Yayın Evi 2',
            'link' => 'link',
            'description' => 'firma tanımı',
            'is_active' => 1,
        ]);

        Publisher::create([
            'user_id' => 1,
            'name' => 'Yayın Evi 3',
            'link' => 'link',
            'description' => 'firma tanımı',
            'is_active' => 1,
        ]);

        Publisher::create([
            'user_id' => 1,
            'name' => 'Yayın Evi 4',
            'link' => 'link',
            'description' => 'firma tanımı',
            'is_active' => 1,
        ]);
    }
}