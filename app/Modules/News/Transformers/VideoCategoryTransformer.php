<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\VideoCategory;
use League\Fractal\TransformerAbstract;

class VideoCategoryTransformer extends TransformerAbstract
{
    public function transform(VideoCategory $record)
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
            'diffHuman' => (string)$record->updated_at->diffForHumans(),
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('video_categories.show', $record->id),
                ],
                [
                    'rel' => 'videoGalleries',
                    'href' => route('video_categories.video_galleries.index', $record->id),
                ],
                [
                    'rel' => 'videos',
                    'href' => route('video_categories.videos.index', $record->id),
                ],
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'title' => 'name',
            'slug' => 'slug',
            'is_cuff' => 'is_cuff',
            'active' => 'is_active',
            'creationDate' => 'created_at',
            'lastChange' => 'updated_at',
            'diffHuman' => 'diff_human',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}