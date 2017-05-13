<?php

namespace App\Modules\Book\Transformers;

use App\Modules\Book\Models\Book;
use App\Modules\Book\Models\BookPublisher;
use League\Fractal\TransformerAbstract;

class BookPublisherTransformer extends TransformerAbstract
{
    public function transform(BookPublisher $record)
    {
        return [
            'id' => (int) $record->id,
            'name' => (string) $record->name,
            'slug' => (string) $record->slug,
            'link' => (string) $record->link,
            'description' => (string) $record->description,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('book_publishers.show', $record->id),
                ],
                [
                    'rel' => 'bookPublishers.bookCategories',
                    'href' => route('book_publishers.book_categories.index', $record->id),
                ],
                [
                    'rel' => 'bookPublishers.books',
                    'href' => route('book_publishers.books.index', $record->id),
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
            'cuff' => 'is_cuff',
            'active' => 'is_active',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}