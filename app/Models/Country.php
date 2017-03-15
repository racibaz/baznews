<?php

namespace App\Models;

use App\Modules\News\Models\News;
use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Country extends Model
{
    use Eventable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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


    public static function validate($input) {
        $rules = array(
            'name' => 'required|min:4|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function countryList()
    {
        return Country::where('is_active',1)->pluck('name','id');
    }
}
