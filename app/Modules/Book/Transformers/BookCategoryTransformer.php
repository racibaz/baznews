<?php

namespace App\Modules\Book\Transformers;

use App\Modules\Book\Models\BookCategory;
use League\Fractal\TransformerAbstract;

class BookCategoryTransformer extends TransformerAbstract
{
    public function transform(BookCategory $record)
    {
        return [
            'id' => (int)$record->id,
            'left' => (string)$record->_lft,
            'right' => (string)$record->_rgt,
            'name' => (string)$record->name,
            'slug' => (string)$record->slug,
            'description' => (string)$record->description,
            'keywords' => (string)$record->keywords,
            'picture' => (string)$record->thumbnail,
            'order' => (int)$record->order,
            'cuff' => (bool)$record->is_cuff,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('book_categories.show', $record->id),
                ],
                [
                    'rel' => 'parent',
                    'href' => route('book_categories.show', $record->id),
                ],
                [
                    'rel' => 'bookPublisher',
                    'href' => route('book_publishers.show', $record->publisher_id),
                ],
                [
                    'rel' => 'bookAuthor',
                    'href' => route('book_authors.show', $record->book_author_id),
                ],
                [
                    'rel' => 'book_categories.books',
                    'href' => route('book_categories.books.index', $record->id),
                ],
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'parent' => 'parent_id',
            'name' => 'name',
            'slug' => 'slug',
            'order' => 'order',
            'active' => 'is_active'
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}