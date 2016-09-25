<?php

namespace App\Modules\Book\Database\Seeds;

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
    }
}
