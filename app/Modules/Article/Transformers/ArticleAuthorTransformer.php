<?php

namespace App\Modules\Article\Transformers;

use App\Modules\Article\Models\ArticleAuthor;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

class ArticleAuthorTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'articles',
        'user'
    ];

    public function transform(ArticleAuthor $record)
    {
        return [
            'id' => (int) $record->id,
            'name' => $record->name,
            'slug' => $record->slug,
            'email' => $record->email,
            'cv' => $record->cv,
            'photo' => $record->photo,
            'description' => $record->description,
            'keywords' => $record->keywords,
            'is_quotation' => $record->is_quotation,
            'is_cuff' => $record->is_cuff
        ];
    }

    public function includeArticles(ArticleAuthor $record)
    {
        return $this->collection($record->articles, new ArticleTransformer);
    }

    public function includeUser(ArticleAuthor $record)
    {
        return $this->item($record->user, new UserTransformer);
    }
}