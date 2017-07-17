<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 17.07.2017
 * Time: 15:37
 */

namespace App\Modules\News\Observers;


use App\Modules\News\Models\News;

class NewsObserver
{
    public function saving(News $record)
    {
        if ($record->status == 1) {
            $record->is_active  = true;
        }else{
            $record->is_active  = false;
        }
    }
}