<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 17.07.2017
 * Time: 15:37
 */

namespace App\Modules\Article\Observers;


use App\Modules\Article\Models\Article;

class ArticleObserver
{
    public function saving(Article $record)
    {
        if ($record->status == 1) {
            $record->is_active  = true;
        }else{
            $record->is_active  = false;
        }
    }
}