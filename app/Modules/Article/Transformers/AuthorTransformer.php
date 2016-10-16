<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\Author;
use League\Fractal\TransformerAbstract;

class AuthorTransformer extends TransformerAbstract
{
    public function transform(Author $record)
    {
        return [
            'id' => (int) $record->id,
            'name' => $record->name,
            'slug' => $record->slug,
            'email' => $record->email,
            'cv' => $record->cv,
            'photo' => $record->photo,
            'description' => $record->description,
            'keywords' => $record->keywords
        ];
    }
}