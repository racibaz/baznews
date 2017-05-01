<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\PhotoCategory;
use League\Fractal\TransformerAbstract;

class PhotoCategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['photo_gallery'];

    public function transform(PhotoCategory $record)
    {
        return [
            'id' => (int) $record->id,
            'name' => $record->name,
            'slug' => $record->slug,
            'description' => $record->description,
            'keywords' => $record->keywords,
            'icon' => $record->icon,
            'is_cuff' =>  $record->is_cuff,
        ];
    }

    public function includePhotoGallery(PhotoCategory $record)
    {
        return $this->collection($record->photo_galleries, new PhotoGalleryTransformer);
    }
}