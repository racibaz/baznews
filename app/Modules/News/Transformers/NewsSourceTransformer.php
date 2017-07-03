<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\NewsSource;
use League\Fractal\TransformerAbstract;

class NewsSourceTransformer extends TransformerAbstract
{
    public function transform(NewsSource $record)
    {
        return [
            'id' => (int)$record->id,
            'name' => (string)$record->name,
            'url' => (string)$record->url,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('news_sources.show', $record->id),
                ],
                [
                    'rel' => 'news',
                    'href' => route('news_sources.news.index', $record->id),
                ]
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'title' => 'name',
            'url' => 'url'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}