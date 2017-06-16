<?php

namespace App\Modules\Biography\Database\Seeds;

use App\Modules\Biogaphy\Database\Seeds\SitemapsTableSeeder;
use Illuminate\Database\Seeder;

class BiographyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BiographiesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(SitemapsTableSeeder::class);
    }
}
