<?php

namespace App\Modules\Book\Transformers;

use App\Modules\Book\Models\BookAuthor;
use League\Fractal\TransformerAbstract;

class BookAuthorTransformer extends TransformerAbstract
{
    public function transform(BookAuthor $record)
    {
        return [
            'id' => (int) $record->id,
            'name' => (string) $record->name,
            'slug' => (string) $record->slug,
            'link' => (string) $record->link,
            'thumbnail' => (string) $record->thumbnail,
            'bio' => (string) $record->bio_note,
            'cuff' => (bool) $record->is_cuff,
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
                    'rel' => 'bookAuthor',
                    'href' => route('book_authors.books.index', $record->id),
                ],
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'cuff' => 'is_cuff',
            'active' => 'is_active',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}