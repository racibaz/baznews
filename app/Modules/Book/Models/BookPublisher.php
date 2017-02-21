<?php

namespace App\Modules\Book\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class BookPublisher extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['name','id']
            ]
        ];
    }

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
        'description',
        'is_active',
    ];

    public function book_categories()
    {
        return $this->belongsToMany('App\Modules\Book\Models\BookCategory', 'book_categories_books', 'book_id', 'book_category_id');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function books()
    {
        return $this->hasMany('App\Modules\Book\Models\Book');
    }


    public static function validate($input) {
        $rules = array(
            'name' => 'required|min:4|max:255',
            'link'  => 'url',
            'description' => 'max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function publisherList()
    {
        return BookPublisher::where('is_active',1)->pluck('name','id');
    }
}
