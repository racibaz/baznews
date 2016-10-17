<?php

namespace App\Modules\Book\Transformers;

use App\Modules\Book\Models\Book;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
{
    public function transform(Book $record)
    {
        return [
            'id' => (int) $record->id,
            'name' => $record->name,
            'slug' => $record->slug,
            'link' => $record->link,
            'thumbnail' => $record->thumbnail,
            'photo' => $record->photo,
            'author' => $record->author,
            'publisher' => $record->publisher,
            'description' => $record->description,
            'ISBN' => $record->ISBN,
            'release_date' => $record->release_date,
            'number_of_print' => $record->number_of_print,
            'skin_type' => $record->skin_type,
            'paper_type' => $record->paper_type,
            'size' => $record->size
        ];
    }
}