<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\News;
use App\Modules\News\Repositories\NewsRepository;
use App\Transformers\CityTransformer;
use App\Transformers\CountryTransformer;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Cache;

class NewsTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'user',
        'country',
        'city',
        'news_source',
        'news_categories',
        'photo_galleries',
        'video_galleries',
        'photos',
        'videos',
        'related_news'
    ];

    public function transform(News $record)
    {
        $data = [
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
            'is_comment' => $record->is_comment,
            'is_show_editor_profile' => $record->is_show_editor_profile,
            'is_show_previous_and_next_news' => $record->is_show_previous_and_next_news,
            'created_at' => $record->created_at,
            'updated_at' => $record->updated_at,
        ];

        if($record->is_show_previous_and_next_news){

            $newsRepo = new NewsRepository();
            $previousNews = $newsRepo->previousNews($record);
            if(empty($previousNews))
                $previousNews = $newsRepo->lastRecord($record);

            $data['previous_news'] = [
                'title' =>  $previousNews->title,
                'link' =>  route('show_news', ['slug' => $previousNews->slug]),
            ];

            $nextNews = $newsRepo->nextNews($record);
            if(empty($nextNews))
                $nextNews = $newsRepo->firstRecord();

            $data['next_news'] = [
                'title' =>  $nextNews->title,
                'link' =>  route('show_news', ['slug' => $nextNews->slug]),
            ];
        }

        return $data;
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

    public function includeNewsCategories(News $record)
    {
        return $this->collection($record->news_categories, new NewsCategoryTransformer);
    }

    public function includePhotoGalleries(News $record)
    {
        return $this->collection($record->photo_galleries, new PhotoGalleryTransformer);
    }

    public function includeVideoGalleries(News $record)
    {
        return $this->collection($record->video_galleries, new VideoGalleryTransformer);
    }

    public function includePhotos(News $record)
    {
        return $this->collection($record->photos, new PhotoTransformer);
    }

    public function includeVideos(News $record)
    {
        return $this->collection($record->videos, new VideoTransformer);
    }

    public function includeRelatedNews(News $record)
    {
        return $this->collection($record->related_news, new RelatedNewsTransformer);
    }
}