<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\RelatedNews;
use App\Modules\News\Models\Video;
use League\Fractal\TransformerAbstract;

class RelatedNewsTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['news'];

    public function transform(RelatedNews $record)
    {
        return [
            'news_id' =>  $record->news_id,
            'related_news_id' => $record->related_news_id
        ];
    }

    public function includeNews(Video $record)
    {
        return $this->item($record->news, new NewsTransformer);
    }
}