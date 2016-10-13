<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\ArticleCategory;
use League\Fractal\TransformerAbstract;

class ArticleCategoryTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'articles'
    ];

    public function transform(ArticleCategory $record)
    {
        return [
            'id' => (int) $record->id,
            'name'  => $record->name,
            'slug'  => $record->slug
        ];
    }

    public function includeArticles(ArticleCategory $record)
    {
        $articles = $record->articles;

        return $this->collection($articles, new ArticleTransformer());
    }

}