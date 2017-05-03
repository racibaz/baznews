<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\Article;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'user',
        'article_author',
        'article_categories',
    ];

    public function transform(Article $record)
    {
        return [
            'id' => $record->id,
            'title' => $record->title,
            'slug' => $record->slug,
            'subtitle' => $record->subtitle,
            'spot' => $record->spot,
            'content' => $record->content,
            'description' => $record->description,
            'keywords' => $record->keywords,
            'created_at' => $record->created_at,
            'updated_at' => $record->updated_at
        ];
    }

    public function includeUser(Article $record)
    {
        return $this->item($record->user, new UserTransformer);
    }

    public function includeArticleAuthor(Article $record)
    {
        return $this->item($record->article_author, new ArticleAuthorTransformer);
    }

    public function includeArticleCategories(Article $record)
    {
        return $this->collection($record->article_categories, new ArticleCategoryTransformer);
    }
}