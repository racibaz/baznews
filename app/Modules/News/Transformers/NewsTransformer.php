<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\News;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{
    public function transform(News $record)
    {
        return [
            'id' => (int) $record->id,
            'country_id' => $record->country_id,
            'city_id' => $record->city_id,
            'link' => $record->link,
            'thumbnail' => $record->thumbnail,
            'photo' => $record->photo,
            'author' => $record->author,
            'publisher' => $record->publisher,
            'description' => $record->description,
        ];
    }
}



//$table->unsignedInteger('user_id');
//$table->unsignedInteger('country_id')->nullable();
//$table->unsignedInteger('city_id')->nullable();
//$table->unsignedInteger('news_resource_id')->nullable();
//$table->string('title')->unique();
//$table->string('slug')->nullable()->unique();
//$table->text('spot');
//$table->text('content');
//$table->text('description')->nullable();
//$table->string('keywords')->nullable();
//$table->text('meta_tags')->nullable();
//$table->string('thumbnail')->nullable();
//$table->string('map_text')->nullable();
//$table->unsignedInteger('hit')->nullable();
//$table->unsignedInteger('status')->nullable();
//$table->boolean('band_news');
//$table->boolean('box_cuff');
//$table->boolean('is_cuff');
//$table->boolean('break_news');
//$table->boolean('main_cuff');
//$table->boolean('mini_cuff');
//$table->boolean('is_comment');
//$table->boolean('is_active');