<?php

namespace App\Modules\Biography\Database\Seeds;

use App\Modules\Biography\Models\Biography;
use Illuminate\Database\Seeder;

class BiographiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biography::create([
            'user_id'                    => 1,
            'full_name'                  => 'Tahir OLgun',
            'slug'                       => 'tahir_oLgun',
            'content'                    => 'Baba Büyüksün',
            'photo'                      => 'Tahir OLgun',
            'description'                => 'Tahir OLgun',
            'keywords'                   => 'Tahir OLgun',
            'hit'                        => 1,
            'order'                      => 1,
            'is_cuff'                    => 1,
            'is_active'                  => 1,
        ]);

        Biography::create([
            'user_id'                    => 2,
            'full_name'                  => 'biography 1',
            'slug'                       => 'biography_1',
            'content'                    => 'biography 1',
            'photo'                      => 'biography 1',
            'description'                => 'biography 1',
            'keywords'                   => 'biography 1',
            'hit'                        => 1,
            'order'                      => 1,
            'is_cuff'                    => 1,
            'is_active'                  => 1,
        ]);

        Biography::create([
            'user_id'                    => 3,
            'full_name'                  => 'biography 2',
            'slug'                       => 'biography_2',
            'content'                    => 'biography 2',
            'photo'                      => 'biography 2',
            'description'                => 'biography 2',
            'keywords'                   => 'biography 2',
            'hit'                        => 1,
            'order'                      => 1,
            'is_cuff'                    => 1,
            'is_active'                  => 1,
        ]);
    }
}