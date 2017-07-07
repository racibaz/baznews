<?php

namespace App\Modules\Biography\Models;

use App\Models\User;
use App\Modules\Biography\Transformers\BiographyTransformer;
use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use Eventable;
    use RevisionableTrait;
    use Sluggable;

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


    protected $table = 'biographies';
    public $transformer = BiographyTransformer::class;
    protected $fillable = ['user_id', 'title', 'spot', 'name', 'slug', 'short_url', 'content', 'photo', 'description', 'keywords', 'order', 'status', 'is_cuff', 'is_active'];

    public static $statuses = ['Passive', 'Active', 'Draft', 'On Air', 'Preparing', 'Pending for Editor Approval', 'Garbage'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function biographyList()
    {
        return Biography::where('is_active', 1)->pluck('name', 'id');
    }
}