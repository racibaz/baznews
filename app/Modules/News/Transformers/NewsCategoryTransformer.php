<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\NewsCategory;
use League\Fractal\TransformerAbstract;

class NewsCategoryTransformer extends TransformerAbstract
{
    public function transform(NewsCategory $record)
    {
        return [
            'id' => (int)$record->id,
            'parent_id' => (int)$record->parent_id,
            '_lft' => (int)$record->_lft,
            '_rgt' => (int)$record->_rgt,
            'name' => (string)$record->name,
            'slug' => (string)$record->slug,
            'description' => (string)$record->description,
            'keywords' => (string)$record->keywords,
            'thumbnail' => (string)$record->thumbnail,
            'is_cuff' => (bool)$record->is_cuff,
            'createdAt' => (string)$record->created_at,
            'updatedAt' => (string)$record->updated_at,
            'diff_human' => (string)$record->updated_at->diffForHumans(),
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('news_categories.show', $record->id),
                ],
                [
                    'rel' => 'news_categories.news.index',
                    'href' => route('news_categories.news.index', $record->id),
                ]
            ]
        ];
    }


    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'parent' => 'parent_id',
            'title' => 'name',
            'slug' => 'slug',
            'description' => 'description',
            'picture' => 'image',
            'cuff' => 'is_cuff',
            'status' => 'status',
            'creationDate' => 'created_at',
            'lastChange' => 'updated_at',
            'diffHuman' => 'diff_human',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}