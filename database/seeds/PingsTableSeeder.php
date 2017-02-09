<?php

use App\Models\Ping;
use Illuminate\Database\Seeder;

class PingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ping::create([
            'ping_list'                  => 'Bilgilendirme',
        ]);
    }
}
