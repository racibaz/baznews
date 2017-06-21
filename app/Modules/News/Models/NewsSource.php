<?php

namespace App\Modules\News\Models;

use App\Modules\News\Transformers\NewsSourceTransformer;
use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class NewsSource extends Model
{
    use Eventable;

    public $transformer = NewsSourceTransformer::class;

    protected $fillable = ['name', 'url', 'is_active'];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public static function newsSourceList()
    {
        return NewsSource::where('is_active',1)->pluck('name', 'id');
    }
}
