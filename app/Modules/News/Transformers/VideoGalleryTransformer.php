<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\VideoGallery;
use League\Fractal\TransformerAbstract;

class VideoGalleryTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['video_categories', 'videos'];

    public function transform(VideoGallery $record)
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

    public function includeVideoCategory(VideoGallery $record)
    {
        return $this->item($record->video_category, new VideoCategoryTransformer);
    }

    public function includeVideos(VideoGallery $record)
    {
        return $this->collection($record->videos, new VideoTransformer);
    }
}