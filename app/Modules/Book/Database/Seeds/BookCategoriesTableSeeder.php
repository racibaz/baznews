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
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Bilgisayar',
            'slug' => 'bilgisayar-1',
            'description' => 'bilgisayar kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 1,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Genel',
            'slug' => 'genel-2',
            'description' => 'genel bilgisayar kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 1,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'İnternet',
            'slug' => 'internet-3',
            'description' => 'internet bilgisayar kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Edebiyat',
            'slug' => 'edebiyat-4',
            'description' => 'Edebiyat kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 4,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Anı',
            'slug' => 'ani-5',
            'description' => 'Anı kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 4,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Roman',
            'slug' => 'roman-6',
            'description' => 'Roman kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 4,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Deneme',
            'slug' => 'deneme-7',
            'description' => 'Deneme kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Felsefe',
            'slug' => 'felsefe-8',
            'description' => 'Felsefe kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 8,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Mantık',
            'slug' => 'mantik-9',
            'description' => 'Mantık kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Tarih',
            'slug' => 'tarih-10',
            'description' => 'Tarih kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 10,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Medeniyetler',
            'slug' => 'medeniyetler-11',
            'description' => 'Medeniyetler kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);


        BookCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Sosyoloji',
            'slug' => 'sosyoloji-12',
            'description' => 'sosyoloji  kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 12,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Kavramlar',
            'slug' => 'kavramlar-13',
            'description' => 'Kavram  kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        BookCategory::create([
            'parent_id' => 12,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Sosyologlar',
            'slug' => 'sosyologlar-14',
            'description' => 'sosyolog kitapları',
            'keywords' => 'keywords',
            'thumbnail' => 'thumbnail path',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);
    }
}
