<?php

namespace App\Models;

use App\Modules\News\Models\News;
use App\Traits\Eventable;
use App\Transformers\CountryTransformer;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Eventable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $transformer = CountryTransformer::class;
    protected $fillable = [
        'name',
        'is_active',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    //todo modules news
    public function news()
    {
        return $this->hasMany(News::class);
    }

    public static function countryList()
    {
        return Country::where('is_active', 1)->pluck('name', 'id');
    }
}
