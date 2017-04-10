<?php

namespace App\Modules\Biography\Models;

use App\Models\User;
use App\Traits\Eventable;
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
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['title','id']
            ]
        ];
    }

    protected $table = 'biographies';
    protected $fillable = ['user_id', 'title', 'spot', 'name', 'slug', 'short_url', 'content', 'photo', 'description', 'keywords', 'order', 'hit', 'status', 'is_cuff', 'is_active'];

    public static $statuses = ['Passive', 'Active', 'Draft', 'On Air', 'Preparing', 'Pending for Editor Approval', 'Garbage'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function biographyList()
    {
        return Biography::where('is_active',1)->pluck('name', 'id');
    }
}