<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\RelatedNews;
use League\Fractal\TransformerAbstract;

class RelatedNewsTransformer extends TransformerAbstract
{
    public function transform(RelatedNews $record)
    {
        return [
            'news_id' =>  $record->news_id,
            'related_news_id' => $record->related_news_id,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('related_news.show', $record->id),
                ],
                [
                    'rel' => 'news',
                    'href' => route('related_news.news.index', $record->id),
                ]
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'news_id' => 'news_id',
            'related_news_id' => 'related_news_id',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}