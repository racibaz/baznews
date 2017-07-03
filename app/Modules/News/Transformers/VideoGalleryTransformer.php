<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\VideoGallery;
use League\Fractal\TransformerAbstract;

class VideoGalleryTransformer extends TransformerAbstract
{
    public function transform(VideoGallery $record)
    {
        return [
            'id' => (int)$record->id,
            'title' => (string)$record->title,
            'slug' => (string)$record->slug,
            'short_url' => (string)$record->short_url,
            'description' => (string)$record->description,
            'keywords' => (string)$record->keywords,
            'thumbnail' => (string)$record->thumbnail,
            'is_cuff' => (bool)$record->is_cuff,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('video_galleries.show', $record->id),
                ],
                [
                    'rel' => 'videoCategory',
                    'href' => route('video_categories.show', $record->video_category_id),
                ],
                [
                    'rel' => 'videos',
                    'href' => route('video_galleries.videos.index', $record->id),
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
            'short_url' => 'short_url',
            'picture' => 'thumbnail',
            'is_cuff' => 'is_cuff',
            'active' => 'is_active'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}