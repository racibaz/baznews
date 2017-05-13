<?php

namespace App\Modules\Book\Models;

use App\Models\City;
use App\Modules\Book\Transformers\BookPublisherTransformer;
use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class BookPublisher extends Model
{
    use Eventable;
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

    public $transformer = BookPublisherTransformer::class;
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
        return $this->belongsToMany(BookCategory::class, 'book_categories_books', 'book_id', 'book_category_id');
    }

    //todo core bağımlılığı
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public static function bookPublisherList()
    {
        return BookPublisher::where('is_active',1)->pluck('name','id');
    }
}
