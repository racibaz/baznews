<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class News extends Model
{
    use RevisionableTrait;

    public $news_types = ['Standard', 'Photo', 'Photo Gallery', 'Video', 'Video Gallery', 'Sound'];

    protected $table = 'news';

    //TODO eklenebilecekler
    //
    // show_time,
    //is_site_index iste haritasında olsun mu tikli gelecek
    //Robots Meta NOINDEX
    //Robots Meta NOFOLLOW
    //Robots Meta NOODP
    //Robots Meta NOYDIR
    //
    //Haber tipi standart,galeri,görsel,video,ses

    //thumbnail hem file ı hem de link i olacak.


    //Etiketler

    protected $fillable = ['user_id', 'country_id', 'city_id', 'news_resource_id', 'title', 'slug', 'spot', 'content', 'description', 'keywords',
        'meta_tags', 'thumbnail', 'hit', 'status', 'band_news', 'box_cuff', 'is_cuff','break_news', 'is_comment', 'main_cuff' ,'mini_cuff' ,'map', 'is_active'];

    public static $statuses = ['Pasif', 'Aktif', 'Taslak', 'Yayında', 'Hazırlanıyor', 'Editor Onayı İçin Beklemede', 'Çöpte'];

    public function news_categories()
    {
        return $this->belongsToMany('App\Modules\News\Models\NewsCategory', 'news_categories_news', 'news_id', 'news_category_id');
    }

    public function photo_galleries()
    {
        return $this->belongsToMany('App\Modules\News\Models\PhotoGallery', 'news_photo_galleries', 'news_id', 'photo_gallery_id');
    }

    public function video_galleries()
    {
        return $this->belongsToMany('App\Modules\News\Models\VideoGallery', 'news_video_galleries', 'news_id', 'video_gallery_id');
    }

    public function photos()
    {
        return $this->belongsToMany('App\Modules\News\Models\Photo', 'news_photos', 'news_id', 'photo_id');
    }

    public function videos()
    {
        return $this->belongsToMany('App\Modules\News\Models\Video', 'news_videos', 'news_id', 'video_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function news_source()
    {
        return $this->belongsTo('App\Modules\News\Models\NewsSource');
    }

    public function future_news()
    {
        return $this->hasMany(FutureNews::class);
    }

    public function recommendation_news()
    {
        return $this->hasMany(RecommendationNews::class);
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function validate($input) {
        $rules = array(
            'title' => 'Required',
            'spot' => 'Required',
            'content' => 'Required',
        );
        return Validator::make($input, $rules);
    }

    public static function newsList()
    {
        return News::where('is_active',1)->pluck('title', 'id');
    }

    public static function newsAllList()
    {
        return News::pluck('title', 'id');
    }
}
