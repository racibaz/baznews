<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\QuotationAuthor;
use Illuminate\Database\Seeder;

class QuotationAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuotationAuthor::create([
            'user_id'                   => 1,
            'name'                      => 'alınto yazar 1',
        ]);
    }
}
