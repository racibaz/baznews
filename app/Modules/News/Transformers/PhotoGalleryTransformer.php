<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\PhotoGallery;
use League\Fractal\TransformerAbstract;

class PhotoGalleryTransformer  extends TransformerAbstract
{
    protected $availableIncludes = ['video_categories', 'videos'];

    public function transform(PhotoGallery $record)
    {
        return [
            'id' => (int) $record->id,
            'title' =>  $record->title,
            'slug' =>  $record->slug,
            'short_url' =>  $record->short_url,
            'description' =>  $record->description,
            'keywords' =>  $record->keywords,
            'thumbnail' =>  $record->thumbnail,
            'is_cuff' =>  $record->is_cuff
        ];
    }

    public function includePhotoCategory(PhotoGallery $record)
    {
        return $this->item($record->photo_category, new PhotoCategoryTransformer);
    }

    public function includePhotos(PhotoGallery $record)
    {
        return $this->collection($record->photos, new PhotoTransformer);
    }


}