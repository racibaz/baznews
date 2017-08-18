<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Setting extends Model
{
    public const PUBLIC = 0, PRIVATE = 1, VERIFIED = 2, NONE = 3;

    use Eventable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attribute_key',
        'attribute_value',
        'is_active',
    ];

    public static function validate($input)
    {
        $rules = array(
            'title' => 'max:255',
            'slogan' => 'max:255',
            'description' => 'max:255',
            'keywords' => 'max:255',
            'logo' => 'image',
            'url' => 'url',
            'rss_count' => 'integer',
            'rss_cache_life_time' => 'integer',
            'sitemap_count' => 'integer',
        );
        return Validator::make($input, $rules);
    }

    public static function isUrlShortener()
    {
        return Setting::where('attribute_key', 'is_url_shortener')->first()->attribute_value == 'true' ? true : false;
    }
}
