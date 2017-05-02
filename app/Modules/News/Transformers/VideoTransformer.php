<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\Video;
use League\Fractal\TransformerAbstract;

class VideoTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['video_gallery', 'video_category'];

    public function transform(Video $record)
    {
        return [
            'id' => (int) $record->id,
            'name' =>  $record->name,
            'slug' =>  $record->slug,
            'short_url' =>  $record->short_url,
            'subtitle' =>  $record->subtitle,
            'thumbnail' =>  $record->thumbnail,
            'file' =>  $record->file,
            'link' =>  $record->link,
            'content' =>  $record->content,
            'keywords' =>  $record->keywords,
            'order' =>  $record->order,
            'is_comment' =>  $record->is_comment
        ];
    }

    public function includeVideoGallery(Video $record)
    {
        return $this->item($record->video_gallery, new VideoGalleryTransformer);
    }

    public function includeVideoCategory(Video $record)
    {
        return $this->item($record->video_category, new VideoCategoryTransformer);
    }
}