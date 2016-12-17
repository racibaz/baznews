<?php

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertisementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $add1 = Advertisement::create([
            'name'                  => 'header_1',
            'code'                  => 'js code',
            'is_active'             => 1,
        ]);

        $add2 = Advertisement::create([
            'name'                  => 'right_blok_1',
            'code'                  => 'js code',
            'is_active'             => 1,
        ]);

        $add3 = Advertisement::create([
            'name'                  => 'center_1',
            'code'                  => 'js code',
            'is_active'             => 1,
        ]);

        $add4 = Advertisement::create([
            'name'                  => 'footer_2',
            'code'                  => 'js code',
            'is_active'             => 1,
        ]);
    }
}
