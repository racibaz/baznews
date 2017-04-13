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
        $this->call(BookAuthorSeederTable::class);
        $this->call(BookPublihersTableSeeder::class);
        $this->call(BookCategoriesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BookWidgetManagerTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(SitemapsTableSeeder::class);


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
