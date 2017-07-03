<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\PhotoCategory;
use League\Fractal\TransformerAbstract;

class PhotoCategoryTransformer extends TransformerAbstract
{
    public function transform(PhotoCategory $record)
    {
        return [
            'id' => (int)$record->id,
            'name' => (string)$record->name,
            'slug' => (string)$record->slug,
            'description' => (string)$record->description,
            'keywords' => (string)$record->keywords,
            'icon' => (string)$record->icon,
            'is_cuff' => (bool)$record->is_cuff,
            'createdAt' => (string)$record->created_at,
            'updatedAt' => (string)$record->updated_at,
            'diff_human' => (string)$record->updated_at->diffForHumans(),
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('photo_categories.show', $record->id),
                ],
                [
                    'rel' => 'photo_categories.photoGalleries',
                    'href' => route('photo_categories.photo_galleries.index', $record->id),
                ]
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'title' => 'name',
            'slug' => 'slug',
            'description' => 'description',
            'cuff' => 'is_cuff',
            'active' => 'is_active',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }


}