<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\ArticleAuthor;
use League\Fractal\TransformerAbstract;

class ArticleAuthorTransformer extends TransformerAbstract
{
    public function transform(ArticleAuthor $record)
    {
        return [
            'id' => (int)$record->id,
            'name' => (string)$record->name,
            'slug' => (string)$record->slug,
            'email' => (string)$record->email,
            'cv' => (string)$record->cv,
            'photo' => (string)$record->photo,
            'description' => (string)$record->description,
            'keywords' => (string)$record->keywords,
            'quotation' => (bool)$record->is_quotation,
            'cuff' => (bool)$record->is_cuff,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('article_authors.show', $record->id),
                ],
                [
                    'rel' => 'user',
                    'href' => route('users.show', $record->user_id),
                ],
                [
                    'rel' => 'articleAuthors.articles',
                    'href' => route('article_authors.articles.index', $record->id),
                ],
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'title',
            'slug' => 'slug',
            'email' => 'email',
            'cuff' => 'is_cuff',
            'active' => 'is_active',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}