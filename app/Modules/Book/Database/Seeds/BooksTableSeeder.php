<?php

namespace App\Modules\Book\Database\Seeds;

use App\Modules\Book\Models\Book;
use App\Modules\Book\Models\BookCategory;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book1 = Book::create([
            'user_id' => 1,
            'book_author_id' => 1,
            'book_publisher_id' => 1,
            'name' => 'kitap 1',
            'slug' => 'kitap1-1',
            'thumbnail' => '1.png',
            'photo' => '1.png',
            'is_cuff' => 1,
            'is_active' => 1
        ]);

        $book2 = Book::create([
            'user_id' => 1,
            'book_author_id' => 2,
            'book_publisher_id' => 1,
            'name' => 'kitap 2',
            'slug' => 'kitap2-2',
            'thumbnail' => '2.png',
            'photo' => '2.png',
            'is_cuff' => 1,
            'is_active' => 1
        ]);

        $book3 = Book::create([
            'user_id' => 1,
            'book_author_id' => 3,
            'book_publisher_id' => 1,
            'name' => 'kitap 3',
            'slug' => 'kitap3-3',
            'thumbnail' => '3.png',
            'photo' => '3.png',
            'is_cuff' => 1,
            'is_active' => 1
        ]);

        $book4 = Book::create([
            'user_id' => 1,
            'book_author_id' => 4,
            'book_publisher_id' => 1,
            'name' => 'kitap 4',
            'slug' => 'kitap4-4',
            'thumbnail' => '4.png',
            'photo' => '4.png',
            'is_cuff' => 1,
            'is_active' => 1
        ]);


        $bookCategory1 = BookCategory::find(1)->first();
        $bookCategory2 = BookCategory::find(2)->first();
        $bookCategory3 = BookCategory::find(3)->first();
        $bookCategory4 = BookCategory::find(4)->first();
        $bookCategory5 = BookCategory::find(5)->first();

        $book1->book_categories()->attach($bookCategory1);
        $book1->book_categories()->attach($bookCategory2);
        $book2->book_categories()->attach($bookCategory3);
        $book3->book_categories()->attach($bookCategory4);
        $book4->book_categories()->attach($bookCategory5);
    }
}
