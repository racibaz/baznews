<?php

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactType::create([
            'name'                  => 'Bilgilendirme',
            'is_active'             => 1,
        ]);

        ContactType::create([
            'name'                  => 'Hata',
            'is_active'             => 1,
        ]);

        ContactType::create([
            'name'                  => 'İstek',
            'is_active'             => 1,
        ]);
    }
}
