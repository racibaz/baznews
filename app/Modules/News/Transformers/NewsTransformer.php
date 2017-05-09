<?php

namespace App\Modules\News\Transformers;

use App\Modules\News\Models\News;
use App\Modules\News\Repositories\NewsRepository;
use App\Transformers\CityTransformer;
use App\Transformers\CountryTransformer;
use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;

class NewsTransformer extends TransformerAbstract
{

    protected  $baseUrl = '/api/v1/news/';
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
            'id' => $record->id,
            'title' => $record->title,
            'smallTitle' => $record->small_title,
            'slug' => $record->slug,
            'shortUrl' => $record->short_url,
            'spot' => $record->spot,
            'content' => $record->content,
            'description' => $record->description,
            'keywords' => $record->keywords,
            'metaTags' => $record->meta_tags,
            'cuffPhoto' => $record->cuff_photo,
            'thumbnail' => $record->thumbnail,
            'cuffDirectLink' => $record->cuff_direct_link,
            'videoEmbed' => $record->video_embed,
            'newsType' => $record->news_type,
            'isComment' => $record->is_comment,
            'isShowEditorProfile' => $record->is_show_editor_profile,
            'isShowPreviousAndNextNews' => $record->is_show_previous_and_next_news,
            'createdAt' => $record->created_at,
            'updatedAt' => $record->updated_at,
//            'diff_human' => $record->updated_at->diffForHumans()
            '_links' => [
                'self' => $this->baseUrl. $record->id,
            ],
        ];

        if ($record->is_show_previous_and_next_news) {

            $newsRepo = new NewsRepository();
            $previousNews = $newsRepo->previousNews($record);
            if (empty($previousNews))
                $previousNews = $newsRepo->lastRecord($record);

            $data['previousNews'] = [
                'title' => $previousNews->title,
                'link' => $this->baseUrl . $previousNews->id,
            ];

            $nextNews = $newsRepo->nextNews($record);
            if (empty($nextNews))
                $nextNews = $newsRepo->firstRecord();

            $data['nextNews'] = [
                'title' => $nextNews->title,
                'link' => $this->baseUrl . $nextNews->id,
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