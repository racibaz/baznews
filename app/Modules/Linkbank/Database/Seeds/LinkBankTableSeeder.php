<?php

//namespace App\Modules\Linkbank\Database\Seeds;

use App\Modules\Linkbank\Models\LinkBankCategory;
use Illuminate\Database\Seeder;

class LinkBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LinkBankCategory::create([
            'parent_id' => 1,
            'name' => 'kategori 1',
            'is_active' => 1,
        ]);

        LinkBankCategory::create([
            'name' => 'kategori 2',
            'is_active' => 1,
        ]);

        LinkBankCategory::create([
            'parent_id' => 1,
            'name' => 'kategori 3',
            'is_active' => 1,
        ]);

        LinkBankCategory::create([
            'parent_id' => 3,
            'name' => 'kategori 4',
            'is_active' => 1,
        ]);

        LinkBankCategory::create([
            'parent_id' => 4,
            'name' => 'kategori 5',
            'is_active' => 1,
        ]);

        LinkBankCategory::create([
            'parent_id' => 1,
            'name' => 'kategori 6',
            'is_active' => 1,
        ]);

        LinkBankCategory::create([
            'parent_id' => 2,
            'name' => 'kategori 6',
            'is_active' => 1,
        ]);

        LinkBankCategory::create([
            'parent_id' => 3,
            'name' => 'kategori 7',
            'is_active' => 1,
        ]);
    }
}
