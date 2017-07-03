<?php

namespace App\Modules\News\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class NewsRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Modules\News\Models\News';

    public function previousNews($record)
    {
        $previousNews = $this
            ->where('id', '<', $record->id)
            ->where('status', 1)
            ->where('is_active', 1)
            ->findAll()
            ->last();

        if (!empty($previousNews))
            return $previousNews;
        else
            return null;
    }

    public function nextNews($record)
    {
        $nextNews = $this
            ->where('id', '>', $record->id)
            ->where('status', 1)
            ->where('is_active', 1)
            ->findAll()
            ->first();

        if (!empty($nextNews))
            return $nextNews;
        else
            return null;
    }


    public function lastRecord()
    {
        return $this
            ->where('status', 1)
            ->where('is_active', 1)
            ->findAll()
            ->last();
    }


    public function firstRecord()
    {
        return $this
            ->where('status', 1)
            ->where('is_active', 1)
            ->findAll()
            ->first();
    }

    //todo php versiyon farkından dolayı "?" hata veriyor.
    //    public function relatedNews($record): ?array
    public function relatedNews($record)
    {
        $relatedNews = [];
        //filter veya map vs.. ye dönüştürülebilinir.
        foreach ($record->related_news as $related_news) {
            array_push($relatedNews, $related_news->related_news_id);
        }

        //todo sadece belirli alanlar getirilebilinir.
        $relatedNewsItems = $this->whereIn('id', $relatedNews)->findAll();

        if ($relatedNewsItems->count())
            return $relatedNewsItems;
        else
            return null;
    }


    public function getLastNewsItems($take = 1000)
    {
        return $this->where('status', 1)
            ->where('is_active', 1)
            ->orderBy('updated_at', 'desc')
            ->findAll()
            ->take($take);
    }

    public function getBandNewsItems($take = 20)
    {
        return $this->where('band_news', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->findAll()
            ->take($take);
    }

    public function getBoxCuffNewsItems($take = 20)
    {
        return $this->where('box_cuff', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->findAll()
            ->take($take);
    }

    public function getBreakNewsItems($take = 20)
    {
        return $this->where('break_news', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->findAll()
            ->take($take);
    }

    public function getMainCuffItems($take = 20)
    {
        return $this->where('main_cuff', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->findAll()
            ->take($take);
    }

    public function getMiniCuffItems($take = 20)
    {
        return $this->where('mini_cuff', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->findAll()
            ->take($take);
    }

}