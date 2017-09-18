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
        $url = url('/');
        Advertisement::create([
            'name'                  => 'left',
            'code'                  => '<a href="'. $url .'" target="_blank"><img src="'. $url .'/img/advert-images/ads-image1.jpeg" alt="bazsoft.biz" /></a>',
            'is_active'             => 1,
        ]);

        Advertisement::create([
            'name'                  => 'right',
            'code'                  => '<a href="'. $url .'" target="_blank"><img src="'. $url .'/img/advert-images/ads-image1.jpeg" alt="bazsoft.biz" /></a>',
            'is_active'             => 1,
        ]);


        Advertisement::create([
            'name'                  => 'header_1',
            'code'                  => '<a href="'. $url .'" target="_blank"><img src="'. $url .'/img/advert-images/728x90.png" alt="bazsoft.biz" width="728" height="90" /></a>',
            'is_active'             => 1,
        ]);

        Advertisement::create([
            'name'                  => 'right_block_1',
            'code'                  => '<a href="'. $url .'" target="_blank"><img src="'. $url .'/img/advert-images/336x280.png" alt="bazsoft.biz" width="360" height="280" /></a>',
            'is_active'             => 1,
        ]);

        Advertisement::create([
            'name'                  => 'center_1',
            'code'                  => '<a href="'. $url .'" target="_blank"><img src="'. $url .'/img/advert-images/728x90.png" alt="bazsoft.biz" width="728" height="90" /></a>',
            'is_active'             => 1,
        ]);

        Advertisement::create([
            'name'                  => 'footer_2',
            'code'                  => 'js code',
            'is_active'             => 1,
        ]);
    }
}
