<?php

namespace App\Modules\Book\Database\Seeds;

use App\Modules\Book\Models\BookCategory;
use Illuminate\Database\Seeder;

class BookCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookCategory::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Psikoloji',
//            'slug'                      => 'psikoloji-1',
            'description'               => 'psikoloji kitapları',
            'keywords'                  => 'keywords',
            'thumbnail'                 => 'thumbnail path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        BookCategory::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Sosyoloji',
            'slug'                      => 'sosyoloji-2',
            'description'               => 'sosyoloji  kitapları',
            'keywords'                  => 'keywords',
            'thumbnail'                 => 'thumbnail path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        BookCategory::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Fen Bilimleri',
            'slug'                      => 'fen-bilimleri-3',
            'description'               => 'fen bilimleri  kitapları',
            'keywords'                  => 'keywords',
            'thumbnail'                 => 'thumbnail path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        BookCategory::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Sosyal Bilimler',
            'slug'                      => 'sosyal-bilimler-4',
            'description'               => 'sosyoloji  kitapları',
            'keywords'                  => 'keywords',
            'thumbnail'                 => 'thumbnail path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        BookCategory::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Matematik Kitapları',
            'slug'                      => 'matematik-kitaplar-5',
            'description'               => 'matematik kitapları',
            'keywords'                  => 'keywords',
            'thumbnail'                 => 'thumbnail path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

    }
}
