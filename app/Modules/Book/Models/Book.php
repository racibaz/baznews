<?php

namespace App\Modules\Book\Models;

use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class Book extends Model
{
    use Eventable;
    use SoftDeletes;
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
        'publisher_id',
        'book_author_id',
        'name',
        'slug',
        'link',
        'thumbnail',
        'photo',
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

    protected $dates = ['created_at','updated_at','deleted_at'];


    public function book_categories()
    {
        return $this->belongsToMany(BookCategory::class, 'book_categories_books', 'book_id', 'book_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function book_author()
    {
        return $this->belongsTo(BookAuthor::class,'book_author_id');
    }

    public function book_publisher()
    {
        return $this->belongsTo(BookPublisher::class,'book_publisher_id');
    }

    public static function bookList()
    {
        return Book::where('is_active',1)->pluck('name','id');
    }
}
