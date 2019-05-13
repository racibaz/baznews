<?php

namespace App\Modules\Book\Transformers;

use App\Modules\Book\Models\Book;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
{
    public function transform(Book $record)
    {
        //todo is_commnet alanı şuan buarada ekli değil.
        return [
            'id' => (int)$record->id,
            'name' => (string)$record->name,
            'slug' => (string)$record->slug,
            'link' => (string)$record->link,
            'thumbnail' => (string)$record->thumbnail,
            'photo' => (string)$record->photo,
            'author' => (string)$record->author,
            'publisher' => (string)$record->publisher,
            'description' => (string)$record->description,
            'ISBN' => (string)$record->ISBN,
            'release_date' => (string)$record->release_date,
            'number_of_print' => (string)$record->number_of_print,
            'skin_type' => (string)$record->skin_type,
            'paper_type' => (string)$record->paper_type,
            'size' => (string)$record->size,
            'cuff' => (bool)$record->is_cuff,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('books.show', $record->id),
                ],
                [
                    'rel' => 'user',
                    'href' => route('users.show', $record->user_id),
                ],
                [
                    'rel' => 'bookPublisher',
                    'href' => route('book_publishers.show', $record->publisher_id),
                ],
                [
                    'rel' => 'bookAuthor',
                    'href' => route('book_authors.show', $record->author_id),
                ],
                [
                    'rel' => 'books.bookCategories',
                    'href' => route('books.book_categories.index', $record->id),
                ],
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'slug' => 'slug',
            'shortUrl' => 'short_url',
            'ISBN' => 'ISBN',
            'releaseDate' => 'release_date',
            'cuff' => 'is_cuff',
            'active' => 'is_active',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}