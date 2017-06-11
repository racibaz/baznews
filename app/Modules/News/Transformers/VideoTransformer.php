<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\Video;
use League\Fractal\TransformerAbstract;

class VideoTransformer extends TransformerAbstract
{
    public function transform(Video $record)
    {
        return [
            'id' =>  (int) $record->id,
            'name' => (string) $record->name,
            'slug' => (string) $record->slug,
            'short_url' => (string) $record->short_url,
            'subtitle' => (string) $record->subtitle,
            'thumbnail' => (string) $record->thumbnail,
            'file' => (string) $record->file,
            'link' => (string) $record->link,
            'embed' => (string) $record->embed,
            'content' => (string) $record->content,
            'keywords' => (string) $record->keywords,
            'order' => (int) $record->order,
            'is_comment' => (bool) $record->is_comment,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('videos.show', $record->id),
                ],
                [
                    'rel' => 'videoCategory',
                    'href' => route('video_categories.show', $record->video_category_id),
                ],
                [
                    'rel' => 'videoGallery',
                    'href' => route('video_galleries.show', $record->video_gallery_id),
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
            'shortUrl' => 'short_url',
            'picture' => 'thumbnail',
            'cuff' => 'is_cuff',
            'order' => 'order',
            'comment' => 'is_comment',
            'active' => 'is_active'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}