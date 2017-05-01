<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\Photo;
use League\Fractal\TransformerAbstract;

class PhotoTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['photo_gallery'];

    public function transform(Photo $record)
    {
        return [
            'id' =>  $record->id,
            'name' =>  $record->name,
            'slug' =>  $record->slug,
            'subtitle' =>  $record->subtitle,
            'thumbnail' =>  $record->thumbnail,
            'file' =>  $record->file,
            'link' =>  $record->link,
            'content' =>  $record->content,
            'keywords' =>  $record->keywords,
            'order' =>  $record->order,
        ];
    }

    public function includePhotoGallery(Photo $record)
    {
        return $this->item($record->photo_gallery, new PhotoGalleryTransformer);
    }
}