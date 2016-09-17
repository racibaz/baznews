<?php

namespace App\Modules\News\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class QuotationAuthor extends Model
{
    protected $table = 'quotation_authors';
    protected $fillable = ['user_id', 'name', 'slug', 'email', 'cv', 'photo', 'description', 'keywords', 'is_cuff', 'is_active'];

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

    public static function quotationAuthorList()
    {
        return QuotationAuthor::where('is_active',1)->pluck('name', 'id');
    }
}