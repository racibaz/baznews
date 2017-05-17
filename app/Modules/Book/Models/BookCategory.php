<?php

namespace App\Modules\Book\Models;

use App\Models\Link;
use App\Modules\Book\Transformers\BookCategoryTransformer;
use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class BookCategory extends Model
{
    use Eventable;
    use Sluggable;
    use NodeTrait;

    public static function boot()
    {
        parent::boot();
        static::created(function ($record) {
            if($record->is_active) {
                $link = new Link();
                $link->url = $record->slug;
                $record->links()->save($link);
            }
        });

        static::updated(function ($record) {
            if($record->is_active) {
                $link = Link::where('linkable_id', $record->id)->where('linkable_type', BookCategory::class)->first();
                $link->url = $record->slug;
                $record->links()->save($link);
            }
        });

        static::deleted(function ($record) {
            $link = Link::where('linkable_id', $record->id)->where('linkable_type', BookCategory::class)->first();
            $record->links()->delete($link);
        });
    }
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

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }

    protected $table = 'book_categories';
    public $transformer = BookCategoryTransformer::class;
    protected $fillable = ['parent_id', '_lft', '_rgt', 'name', 'slug', 'description', 'keywords', 'thumbnail', 'order', 'is_cuff', 'is_active'];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories_books', 'book_category_id', 'book_id');
    }

    public function links()
    {
        return $this->morphMany(Link::class, 'linkable');
    }

    public static function bookCategoryList()
    {
        return BookCategory::where('is_active',1)->pluck('name', 'id');
    }
}
