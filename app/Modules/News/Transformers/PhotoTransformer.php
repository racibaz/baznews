<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\Photo;
use League\Fractal\TransformerAbstract;

class PhotoTransformer extends TransformerAbstract
{
    public function transform(Photo $record)
    {
        return [
            'id' => (int)$record->id,
            'name' => (string)$record->name,
            'slug' => (string)$record->slug,
            'subtitle' => (string)$record->subtitle,
            'thumbnail' => (string)$record->thumbnail,
            'file' => (string)$record->file,
            'link' => (string)$record->link,
            'content' => (string)$record->content,
            'keywords' => (string)$record->keywords,
            'order' => (int)$record->order,
            'createdAt' => (string)$record->created_at,
            'updatedAt' => (string)$record->updated_at,
            'diff_human' => (string)$record->updated_at->diffForHumans(),
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('photos.show', $record->id),
                ],
                [
                    'rel' => 'photoGalleries',
                    'href' => route('photo_galleries.show', $record->id),
                ],
                [
                    'rel' => 'photos.news',
                    'href' => route('photos.news.index', $record->id),
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
            'picture' => 'thumbnail',
            'link' => 'link',
            'order' => 'order',
            'active' => 'is_active',
            'creationDate' => 'created_at',
            'lastChange' => 'updated_at',
            'diffHuman' => 'diff_human',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}