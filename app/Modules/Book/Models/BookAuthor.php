<?php

namespace App\Modules\Book\Models;

use App\Modules\Book\Transformers\BookAuthorTransformer;
use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use Eventable;
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

    protected $table = 'book_authors';

    public $transformer = BookAuthorTransformer::class;
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
        'bio_note',
        'is_cuff',
        'is_active',
    ];

    public function books()
    {
        return $this->hasMany(Book::class,'author_id');
    }

    public static function bookAuthorList()
    {
        return BookAuthor::where('is_active', 1)->pluck('name', 'id');
    }
}
