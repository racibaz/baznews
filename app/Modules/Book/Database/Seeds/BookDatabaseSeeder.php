<?php

namespace App\Modules\Book\Database\Seeds;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class BookDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BooksTableSeeder::class);


        $setting = Setting::where('attribute_key','book_count')->first();
        if(empty($setting))
        {
            Setting::create([
                'attribute_key'               => 'book_count',
                'attribute_value'             => '5',
            ]);
        }
    }
}
