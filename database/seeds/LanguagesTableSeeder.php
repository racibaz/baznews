<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'en',
            'is_active' => 1
        ]);

        Language::create([
            'name' => 'tr',
            'is_active' => 1
        ]);
    }
}
