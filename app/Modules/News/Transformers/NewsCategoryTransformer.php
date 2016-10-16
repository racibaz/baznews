<?php

namespace App\Modules\News\Transformers;


use App\Modules\News\Models\NewsCategory;
use League\Fractal\TransformerAbstract;

class NewsCategoryTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'news'
    ];

    public function transform(NewsCategory $record)
    {
        return [
            'id' => (int) $record->id,
            '_lft'  => $record->_lft,
            '_rgt'  => $record->_rgt,
            'parent_id'  => $record->parent_id,
            'name'  => $record->name,
            'description'  => $record->description,
            'keywords'  => $record->keywords,
            'hit'  => $record->hit,
            'icon'  => $record->icon,
            'slug'  => $record->slug
        ];
    }

    public function includeNews(NewsCategory $record)
    {
        $newsCollection = $record->news;

        return $this->collection($newsCollection, new NewsTransformer());
    }
}