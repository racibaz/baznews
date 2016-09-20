<?php

namespace App\Modules\Article\Models;

use App\Models\User;
use Eloquent;
use Illuminate\Support\Facades\Validator;

class Author extends Eloquent
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $table = 'authors';
    protected $fillable = ['user_id', 'name', 'slug', 'email', 'cv', 'photo', 'description', 'keywords', 'is_quotation', 'is_cuff', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function validate($input) {
        $rules = array(
            'user_id' => 'required',
            'name' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function authorList()
    {
        return Author::where('is_active',1)->pluck('name', 'id');
    }
}