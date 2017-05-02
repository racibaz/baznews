<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\NewsCategory;
use League\Fractal\TransformerAbstract;

class NewsCategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['news'];

    public function transform(NewsCategory $record)
    {
        return [
            'id' => (int) $record->id,
            'parent_id'  => $record->parent_id,
            '_lft'  => $record->_lft,
            '_rgt'  => $record->_rgt,
            'name'  => $record->name,
            'slug'  => $record->slug,
            'description'  => $record->description,
            'keywords'  => $record->keywords,
            'hit'  => $record->hit,
            'thumbnail'  => $record->thumbnail,
            'is_cuff'  => $record->is_cuff,
        ];
    }

    public function includeNews(NewsCategory $record)
    {
        return $this->collection($record->news, new NewsTransformer);
    }
}