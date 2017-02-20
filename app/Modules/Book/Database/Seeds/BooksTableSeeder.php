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
                    'user_id'               => 1,
                    'name'                  => 'kitap 1',
                    'slug'                  => 'kitap slug',
                    'link'                  => 'link',
                    'thumbnail'             => 'thumbnail',
        //            'photo',
        //            'author',
        //            'publisher',
        //            'description',
        //            'ISBN',
        //            'release_date',
        //            'number_of_print',
        //            'skin_type',
        //            'paper_type',
        //            'size',
                    'is_cuff'               => 1,
                    'is_active'             => 1
                ]);


        $book2 = Book::create([
            'user_id'               => 1,
            'name'                  => 'kitap 2',
            'slug'                  => 'kitap slug',
            'link'                  => 'link',
            'thumbnail'             => 'thumbnail',
            //            'photo',
            //            'author',
            //            'publisher',
            //            'description',
            //            'ISBN',
            //            'release_date',
            //            'number_of_print',
            //            'skin_type',
            //            'paper_type',
            //            'size',
            'is_cuff'               => 1,
            'is_active'             => 1
        ]);


        $book3 = Book::create([
            'user_id'               => 1,
            'name'                  => 'kitap 3',
            'slug'                  => 'kitap slug',
            'link'                  => 'link',
            'thumbnail'             => 'thumbnail',
            //            'photo',
            //            'author',
            //            'publisher',
            //            'description',
            //            'ISBN',
            //            'release_date',
            //            'number_of_print',
            //            'skin_type',
            //            'paper_type',
            //            'size',
            'is_cuff'               => 1,
            'is_active'             => 1
        ]);

        $book4 = Book::create([
            'user_id'               => 1,
            'name'                  => 'kitap 4',
            'slug'                  => 'kitap slug',
            'link'                  => 'link',
            'thumbnail'             => 'thumbnail',
            //            'photo',
            //            'author',
            //            'publisher',
            //            'description',
            //            'ISBN',
            //            'release_date',
            //            'number_of_print',
            //            'skin_type',
            //            'paper_type',
            //            'size',
            'is_cuff'               => 1,
            'is_active'             => 1
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
