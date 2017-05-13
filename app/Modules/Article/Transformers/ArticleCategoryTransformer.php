<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\ArticleCategory;
use League\Fractal\TransformerAbstract;

class ArticleCategoryTransformer extends TransformerAbstract
{
    public function transform(ArticleCategory $record)
    {
        return [
            'id' => $record->id,
            'parent' => $record->parent_id,
            'name' => $record->name,
            'slug' => $record->slug,
            'description' => $record->description,
            'keywords' => $record->keywords,
            'icon' => $record->icon,
            'cuff' => $record->is_cuff,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('article_categories.show', $record->id),
                ],
                [
                    'rel' => 'parent',
                    'href' => route('article_categories.show', $record->parent_id),
                ],
                [
                    'rel' => 'articleAuthor',
                    'href' => route('article_authors.show', $record->article_author_id),
                ],
                [
                    'rel' => 'articles.articleCategories',
                    'href' => route('article_categories.articles.index', $record->id),
                ]
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'parent' => 'parent_id',
            'name' => 'title',
            'slug' => 'slug',
            'description' => 'description',
            'keywords' => 'keywords',
            'cuff' => 'is_cuff',
            'active' => 'is_active'
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}