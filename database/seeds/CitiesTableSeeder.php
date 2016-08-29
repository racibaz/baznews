<?php

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'country_id'            => Country::first()->id,
            'name'                  => 'İstanbul',
            'is_active'             => 1,
        ]);

        City::create([
            'country_id'            => Country::first()->id + 1,
            'name'                  => 'Ankara',
            'is_active'             => 1,
        ]);

        City::create([
            'country_id'            => Country::first()->id + 1,
            'name'                  => 'Aydın',
            'is_active'             => 1,
        ]);
    }
}
