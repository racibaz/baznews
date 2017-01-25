<?php

namespace App\Modules\News\Models;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Laravel\Scout\Searchable;
use Venturecraft\Revisionable\RevisionableTrait;

class News extends Model
{
    use SoftDeletes;
    use Searchable;
    use RevisionableTrait;
    use Sluggable;


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['title','id']
            ]
        ];
    }


    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'news';
    }


    public static $newsTypes = ['Standard', 'Private News','Photo', 'Photo Gallery', 'Video', 'Video Gallery', 'Sound'];

    public static $statuses = ['Passive', 'Active', 'Draft', 'On Air', 'Preparing', 'Pending for Editor Approval', 'Garbage'];

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

    //is_draft taslak mı ekleneck

    protected $fillable = ['user_id', 'country_id', 'city_id', 'news_resource_id',
        'title', 'small_title','slug', 'spot', 'content', 'description', 'keywords', 'meta_tags', 'cuff_photo', 'thumbnail', 'video_embed',
        'news_type',
        'hit', 'status', 'band_news', 'box_cuff', 'is_cuff','break_news', 'main_cuff' ,'mini_cuff' ,'map', 'is_comment', 'is_show_editor_profile', 'is_active'];

    protected $dates = ['created_at','updated_at','deleted_at'];


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

    public function related_news()
    {
        return $this->hasMany(RelatedNews::class);
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news_source()
    {
        return $this->belongsTo('App\Modules\News\Models\NewsSource');
    }

    public function future_news()
    {
        return $this->hasOne(FutureNews::class);
    }

    public function recommendation_news()
    {
        return $this->hasOne(RecommendationNews::class);
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
            'cuff_photo' => 'image|max:255',
            'thumbnail' => 'image|max:255',
        );
        return Validator::make($input, $rules);
    }

    public function scopeStatus($query, $flag)
    {
        return $query->where('status', $flag);
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
