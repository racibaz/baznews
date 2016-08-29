<?php


use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name'                  => 'Türkiye',
            'is_active'             => 1,
        ]);

        Country::create([
            'name'                  => 'Azerbaycan',
            'is_active'             => 1,
        ]);

        Country::create([
            'name'                  => 'Kazakistan',
            'is_active'             => 1,
        ]);

        Country::create([
            'name'                  => 'Türkmenistan',
            'is_active'             => 1,
        ]);

    }
}
