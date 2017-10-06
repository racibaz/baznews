<?php

namespace App\Modules\Book\Models;

use App\Modules\Book\Transformers\BookTransformer;
use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name', 'id']
            ]
        ];
    }

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }


    public $transformer = BookTransformer::class;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'publisher_id',
        'author_id',
        'name',
        'slug',
        'short_url',
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
        'is_comment',
        'is_cuff',
        'is_active',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


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
        return $this->belongsTo(BookAuthor::class, 'author_id');
    }

    public function book_publisher()
    {
        return $this->belongsTo(BookPublisher::class, 'publisher_id');
    }

    public static function bookList()
    {
        return Book::where('is_active', 1)->pluck('name', 'id');
    }
}
