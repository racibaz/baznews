<?php

namespace App\Modules\Book\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'link',
        'thumbnail',
        'photo',
        'author',
        'publisher',
        'description',
        'ISBN',
        'release_date',
        'number_of_print',
        'skin_type',
        'paper_type',
        'size',
        'is_cuff',
        'is_active',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|min:4|max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function bookist()
    {
        return Book::where('is_active',1)->pluck('name','id');
    }
}
