<?php

namespace App\Modules\News\Models;

use App\Models\User;
use App\Modules\News\Transformers\NewsTransformer;
use App\Traits\Eventable;
use App\Traits\TagRelationTrait;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use Eventable;
    use SoftDeletes;
    use RevisionableTrait;
    use Sluggable;
    use TagRelationTrait;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }


    protected $table = 'news';
    public $transformer = NewsTransformer::class;
    public static $newsTypes = ['Standard', 'Private News', 'Internal News', 'Photo Gallery', 'Video', 'Video Gallery', 'Sound'];
    public static $statuses = ['Passive', 'Active', 'Draft', 'On Air', 'Preparing', 'Pending for Editor Approval', 'Garbage'];

    protected $fillable = ['user_id', 'country_id', 'city_id', 'news_source_id',
        'title', 'small_title', 'slug', 'spot', 'short_url', 'content', 'description', 'keywords', 'meta_tags', 'cuff_photo', 'thumbnail', 'cuff_direct_link',
        'source_link', 'video_embed', 'news_type', 'status', 'band_news', 'box_cuff', 'is_cuff', 'break_news', 'main_cuff', 'mini_cuff', 'map', 'is_comment',
        'is_show_editor_profile', 'is_show_previous_and_next_news', 'is_ping', 'is_active'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public function news_categories()
    {
        return $this->belongsToMany(NewsCategory::class, 'news_categories_news', 'news_id', 'news_category_id');
    }

    public function photo_galleries()
    {
        return $this->belongsToMany(PhotoGallery::class, 'news_photo_galleries', 'news_id', 'photo_gallery_id');
    }

    public function video_galleries()
    {
        return $this->belongsToMany(VideoGallery::class, 'news_video_galleries', 'news_id', 'video_gallery_id');
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'news_photos', 'news_id', 'photo_id');
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'news_videos', 'news_id', 'video_id');
    }

    public function related_news()
    {
        return $this->hasMany(RelatedNews::class);
    }

    //todo core model
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    //todo core model
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    //todo core model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news_source()
    {
        return $this->belongsTo(NewsSource::class);
    }

    public function future_news()
    {
        return $this->hasOne(FutureNews::class);
    }

    public function recommendation_news()
    {
        return $this->hasOne(RecommendationNews::class);
    }

    public function scopeStatus($query, $flag)
    {
        return $query->where('status', $flag);
    }

    public static function newsList()
    {
        return News::where('is_active', 1)->pluck('title', 'id');
    }

    public static function newsAllList()
    {
        return News::pluck('title', 'id');
    }

}
