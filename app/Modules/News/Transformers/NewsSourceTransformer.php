<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\NewsSource;
use League\Fractal\TransformerAbstract;

class NewsSourceTransformer extends TransformerAbstract
{
    public function transform(NewsSource $record)
    {
        return [
            'id' =>  $record->id,
            'name' =>  $record->name,
            'url' =>  $record->url,
        ];
    }
}