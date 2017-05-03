<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\ArticleCategory;
use League\Fractal\TransformerAbstract;

class ArticleCategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'articles'
    ];

    public function transform(ArticleCategory $record)
    {
        return [
            'id' => $record->id,
            'name' => $record->name
        ];
    }

    public function includeArticles(ArticleCategory $record)
    {
        return $this->collection($record->articles, new ArticleTransformer);
    }
}