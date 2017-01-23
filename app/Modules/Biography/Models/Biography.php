<?php

namespace App\Modules\Biography\Models;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Biography extends Model
{
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
                'source' => ['full_name']
            ]
        ];
    }

    protected $table = 'biographies';
    //todo biografiye title veya name alanı eklenecek
    protected $fillable = ['user_id', 'full_name', 'slug', 'content', 'photo', 'description', 'keywords', 'order', 'hit', 'is_cuff', 'is_active'];

    public static $statuses = ['Pasif', 'Aktif', 'Taslak', 'Yayında', 'Hazırlanıyor', 'Editor Onayı İçin Beklemede', 'Çöpte'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function validate($input) {
        $rules = array(
            'full_name' => 'required',
            'content' => 'required',
            'order' => 'integer',
            'hit' => 'integer',
            'photo' => 'image|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function biographyList()
    {
        return Biography::where('is_active',1)->pluck('full_name', 'id');
    }
}