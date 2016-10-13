<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    public function transform(Article $record)
    {
        return [
            'id' => (int) $record->id,
            'title' => $record->title,
            'slug' => $record->slug,
            'subtitle' => $record->subtitle,
            'spot' => $record->spot,
            'content' => $record->content,
            'description' => $record->description,
            'keywords' => $record->keywords
        ];
    }
}