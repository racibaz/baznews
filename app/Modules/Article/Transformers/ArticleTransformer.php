<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    public function transform(Article $record)
    {
        return [
            'id' => (int)$record->id,
            'title' => (string)$record->title,
            'slug' => (string)$record->slug,
            'shortUrl' => (string)$record->short_url,
            'subtitle' => (string)$record->subtitle,
            'spot' => (string)$record->spot,
            'content' => (string)$record->content,
            'description' => (string)$record->description,
            'keywords' => (string)$record->keywords,
            'order' => (int)$record->order,
            'cuff' => (bool)$record->is_cuff,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('articles.show', $record->id),
                ],
                [
                    'rel' => 'user',
                    'href' => route('users.show', $record->user_id),
                ],
                [
                    'rel' => 'articleAuthor',
                    'href' => route('article_authors.show', $record->article_author_id),
                ],
                [
                    'rel' => 'articles.articleCategories',
                    'href' => route('articles.article_categories.index', $record->id),
                ]
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'title',
            'slug' => 'slug',
            'shortUrl' => 'short_url',
            'cuff' => 'is_cuff',
            'status' => 'status',
            'active' => 'is_active',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}