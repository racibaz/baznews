<?php

namespace App\Modules\Book\Models;

use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Validator;
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
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['name','id']
            ]
        ];
    }


    protected $table = 'book_authors';

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
        return $this->hasMany(Book::class);
    }

    public static function bookAuthorList()
    {
        return BookAuthor::where('is_active',1)->pluck('name','id');
    }
}
