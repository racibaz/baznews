<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\VideoCategory;
use League\Fractal\TransformerAbstract;

class VideoCategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['video_galleries', 'videos'];

    public function transform(VideoCategory $record)
    {
        return [
            'id' => $record->id,
            'name' => $record->name,
            'slug' => $record->slug,
            'description' => $record->description,
            'keywords' => $record->keywords,
            'icon' => $record->icon,
            'is_cuff' =>  $record->is_cuff,
        ];
    }

    public function includeVideoGalleries(VideoCategory $record)
    {
        return $this->collection($record->video_galleries, new VideoGalleryTransformer);
    }

    public function includeVideos(VideoCategory $record)
    {
        return $this->collection($record->videos, new VideoTransformer);
    }
}