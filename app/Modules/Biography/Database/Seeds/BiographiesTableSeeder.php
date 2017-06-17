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
            'title'                      => 'Tahir Olgun Kimdir 1',
            'spot'                       => 'Tahir Olgun Kimdir Spot',
            'name'                       => 'Tahir OLgun',
            'slug'                       => 'tahir-oLgun-kimdir-1',
            'content'                    => 'Baba Büyüksün',
            'photo'                      => 't1.png',
            'description'                => 'Tahir OLgun',
            'keywords'                   => 'Tahir OLgun',
            'hit'                        => 1,
            'order'                      => 1,
            'status'                     => 1,
            'is_cuff'                    => 1,
            'is_active'                  => 1,
        ]);

        Biography::create([
            'user_id'                    => 1,
            'title'                      => 'Şefik Can Kimdir 2',
            'spot'                       => 'Şefik Can Kimdir Spot',
            'name'                       => 'Şefik Can',
            'slug'                       => 'sefik_can-kimdir-2',
            'content'                    => 'Baba Büyüksün',
            'photo'                      => '1.gif',
            'description'                => 'Şefik Can',
            'keywords'                   => 'Şefik Can',
            'hit'                        => 1,
            'order'                      => 1,
            'status'                     => 1,
            'is_cuff'                    => 1,
            'is_active'                  => 1,
        ]);

        Biography::create([
            'user_id'                    => 1,
            'title'                      => 'Tahir Olgun Kimdir 3',
            'spot'                       => 'Tahir Olgun Kimdir Spot',
            'name'                       => 'Tahir OLgun 3',
            'slug'                       => 'tahir-oLgun-kimdir-3',
            'content'                    => 'Baba Büyüksün',
            'photo'                      => '1.gif',
            'description'                => 'Tahir OLgun',
            'keywords'                   => 'Tahir OLgun',
            'hit'                        => 1,
            'order'                      => 1,
            'status'                     => 1,
            'is_cuff'                    => 1,
            'is_active'                  => 1,
        ]);
    }
}