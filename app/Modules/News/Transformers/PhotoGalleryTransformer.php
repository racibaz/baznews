<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\PhotoGallery;
use League\Fractal\TransformerAbstract;

class PhotoGalleryTransformer  extends TransformerAbstract
{
    public function transform(PhotoGallery $record)
    {
        return [
            'id' => (int) $record->id,
            'title' => (string) $record->title,
            'slug' =>  (string) $record->slug,
            'short_url' => (string) $record->short_url,
            'description' => (string) $record->description,
            'keywords' => (string) $record->keywords,
            'thumbnail' => (string) $record->thumbnail,
            'is_cuff' => (bool) $record->is_cuff,
            'createdAt' => (string) $record->created_at,
            'updatedAt' => (string) $record->updated_at,
            'diff_human' => (string) $record->updated_at->diffForHumans(),
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('photo_galleries.show', $record->id),
                ],
                [
                    'rel' => 'photoCategory',
                    'href' => route('photo_categories.show', $record->photo_category_id),
                ],
                [
                    'rel' => 'photos',
                    'href' => route('photo_galleries.photos.index', $record->id),
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
            'active' => 'is_active',
            'creationDate' => 'created_at',
            'lastChange' => 'updated_at',
            'diffHuman' => 'diff_human',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}