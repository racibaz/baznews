<?php

namespace App\Modules\News\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class NewsSource extends Model
{
    use Eventable;

    protected $fillable = ['name', 'url', 'is_active'];

    public function news()
    {
        return $this->hasMany('App\Modules\News\Models\News');
    }

    public static function validate($input) {
        $rules = array(
            'name' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function newsSourceList()
    {
        return NewsSource::where('is_active',1)->pluck('name', 'id');
    }
}
