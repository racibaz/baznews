<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\News;
use App\Transformers\CityTransformer;
use App\Transformers\CountryTransformer;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user', 'country', 'city', 'news_source'];

    public function transform(News $record)
    {
        return [
            'id' => (int) $record->id,
            'title' => $record->title,
            'small_title' => $record->small_title,
            'slug' => $record->slug,
            'short_url' => $record->short_url,
            'spot' => $record->spot,
            'content' => $record->content,
            'description' => $record->description,
            'keywords' => $record->keywords,
            'meta_tags' => $record->meta_tags,
            'cuff_photo' => $record->cuff_photo,
            'thumbnail' => $record->thumbnail,
            'cuff_direct_link' => $record->cuff_direct_link,
            'video_embed' => $record->video_embed,
            'news_type' => $record->news_type,
            'map_text' => $record->map_text,
            'hit' => $record->hit,
            'status' => $record->status,
            'band_news' => $record->band_news,
            'box_cuff' => $record->box_cuff,
            'is_cuff' => $record->is_cuff,
            'break_news' => $record->break_news,
            'main_cuff' => $record->main_cuff,
            'mini_cuff' => $record->mini_cuff,
            'is_comment' => $record->is_comment,
            'is_show_editor_profile' => $record->is_show_editor_profile,
            'is_show_previous_and_next_news' => $record->is_show_previous_and_next_news,
            'is_active' => $record->is_active,
            'created_at' => $record->created_at,
            'updated_at' => $record->updated_at,
            'deleted_at' => $record->deleted_at,
        ];
    }

    public function includeUser(News $record)
    {
        return $this->item($record->user, new UserTransformer);
    }

    public function includeCountry(News $record)
    {
        return $this->item($record->country, new CountryTransformer);
    }

    public function includeCity(News $record)
    {
        return $this->item($record->city, new CityTransformer);
    }

    public function includeNewsSource(News $record)
    {
        return $this->item($record->news_source, new NewsSourceTransformer);
    }

//    public function includePosts(Topic $topic)
//    {
//        return $this->collection($topic->posts, new PostTransformer);
//    }
}