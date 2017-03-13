<?php

namespace App\Modules\News\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class NewsSetting extends Model
{
    use Eventable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'break_news',
        'band_news',
        'box_cuff',
        'main_cuff',
        'mini_cuff',
        'find_tags_in_content',
        'automatic_add_tags',
        'is_show_editor_profile_in_news',
        'is_show_previous_and_next_news',
    ];

    public static function validate($input) {
        $rules = array(
            'break_news' => 'integer',
            'band_news' => 'integer',
            'box_cuff' => 'integer',
            'main_cuff' => 'integer',
            'mini_cuff' => 'integer',
            'find_tags_in_content' => 'integer',
            'automatic_add_tags' => 'integer',
            'is_show_editor_profile_in_news' => 'integer',
            'is_show_previous_and_next_news' => 'integer',
        );
        return Validator::make($input, $rules);
    }
}
