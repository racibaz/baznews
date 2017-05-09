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
            'title' => (string) $record->title,
            'smallTitle' => (string) $record->small_title,
            'slug' => (string) $record->slug,
            'shortUrl' => (string) $record->short_url,
            'spot' => (string) $record->spot,
            'content' => (string) $record->content,
            'description' => (string) $record->description,
            'keywords' => (string) $record->keywords,
            'metaTags' => (string) $record->meta_tags,
            'cuffPhoto' => (string) $record->cuff_photo,
            'thumbnail' => (string) $record->thumbnail,
            'cuffDirectLink' => (string) $record->cuff_direct_link,
            'videoEmbed' => (string) $record->video_embed,
            'newsType' => (int) $record->news_type,
            'isComment' => (bool) $record->is_comment,
            'isShowEditorProfile' => (bool) $record->is_show_editor_profile,
            'isShowPreviousAndNextNews' => (string) $record->is_show_previous_and_next_news,
            'createdAt' => (string) $record->created_at,
            'updatedAt' => (string) $record->updated_at,
            'diff_human' => $record->updated_at->diffForHumans(),

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('news.show', $record->id),
                ],
                [
                    'rel' => 'news.categories',
                    //todo burada kaldım.
//                    'href' => route('products.categories.index', $record->id),
                ],
            ]
        ];

        if ($record->is_show_previous_and_next_news) {

            $newsRepo = new NewsRepository();
            $previousNews = $newsRepo->previousNews($record);
            if (empty($previousNews))
                $previousNews = $newsRepo->lastRecord($record);

            $data['previousNews'] = [
                'title' => $previousNews->title,
                'href' => route('news.show', $previousNews->id),
            ];

            $nextNews = $newsRepo->nextNews($record);
            if (empty($nextNews))
                $nextNews = $newsRepo->firstRecord();

            $data['nextNews'] = [
                'title' => $nextNews->title,
                'href' => route('news.show', $previousNews->id),
            ];
        }

        return $data;
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'title' => 'name',
            'description' => 'description',
            'picture' => 'image',
            'seller' => 'seller_id',
            'status' => 'status',
            'creationDate' => 'created_at',
            'lastChange' => 'updated_at',
            'diffHuman' => 'diff_human',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identifier',
            'name' => 'title',
            'description' => 'details',
            'quantity' => 'stock',
            'status' => 'situation',
            'image' => 'picture',
            'seller_id' => 'seller',
            'created_at' => 'creationDate',
            'updated_at' => 'lastChange',
            'deleted_at' => 'deletedDate',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}