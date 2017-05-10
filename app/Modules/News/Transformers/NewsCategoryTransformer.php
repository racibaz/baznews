<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\NewsCategory;
use League\Fractal\TransformerAbstract;

class NewsCategoryTransformer extends TransformerAbstract
{
    public function transform(NewsCategory $record)
    {
        return [
            'id' => (int) $record->id,
            'parent_id'  => (int) $record->parent_id,
            '_lft'  => (int) $record->_lft,
            '_rgt'  => (int) $record->_rgt,
            'name'  => (string) $record->name,
            'slug'  => (string) $record->slug,
            'description'  => (string) $record->description,
            'keywords'  => (string) $record->keywords,
            'hit'  => (int) $record->hit,
            'thumbnail'  => (string) $record->thumbnail,
            'is_cuff'  => (bool) $record->is_cuff,
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
            'title' => 'name',
            'description' => 'description',
            'picture' => 'image',
            'seller' => 'seller_id',
            'status' => 'status',
            'creationDate' => 'created_at',
            'lastChange' => 'updated_at',
            'diffHuman' => 'diff_human',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identifier',
            'name' => 'title',
            'description' => 'details',
            'quantity' => 'stock',
            'status' => 'situation',
            'image' => 'picture',
            'seller_id' => 'seller',
            'created_at' => 'creationDate',
            'updated_at' => 'lastChange',
            'deleted_at' => 'deletedDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}