<?php

namespace App\Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'news_category_id' => 'integer|nullable',
                    'photo_gallery_id' => 'integer|nullable',
                    'photo_category_id' => 'integer|nullable',
                    'photo_id' => 'integer|nullable',
                    'video_gallery_id' => 'integer|nullable',
                    'video_category_id' => 'integer|nullable',
                    'video_id' => 'integer|nullable',

                    'user_id' => 'integer|nullable',
                    'country_id' => 'integer|nullable',
                    'city_id' => 'integer|nullable',
                    'news_source_id' => 'integer|nullable',
                    'title' => [
                        'required',
                        'max:255',
                        Rule::unique('news'),
                    ],
                    'small_title' => 'string|nullable',
                    'slug' => [
                        'max:255',
                        Rule::unique('news'),
                        'nullable'
                    ],
                    'short_url' => 'url|nullable',
                    'spot' => 'required',
                    'content' => 'required',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                    'meta_tags' => 'string|max:255|nullable',
                    'cuff_photo' => 'image||nullable',
                    'thumbnail' => 'image|nullable',
                    'cuff_direct_link' => 'string|url|nullable',
                    'video_embed' => 'string|nullable',
                    'news_type' => 'integer|nullable',
                    'map_text' => 'max:255|nullable',
                    'hit' => 'integer|nullable',
                    'status' => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('news')->id;
                return [

                    'news_category_id' => 'integer|nullable',
                    'photo_gallery_id' => 'integer|nullable',
                    'photo_category_id' => 'integer|nullable',
                    'photo_id' => 'integer|nullable',
                    'video_gallery_id' => 'integer|nullable',
                    'video_category_id' => 'integer|nullable',
                    'video_id' => 'integer|nullable',

                    'user_id' => 'integer|nullable',
                    'country_id' => 'integer|nullable',
                    'city_id' => 'integer|nullable',
                    'news_source_id' => 'integer|nullable',
                    'title' => [
                        'required',
                        'max:255',
                        Rule::unique('news')->ignore($id),
                    ],
                    'small_title' => 'string|nullable',
                    'slug' => [
                        'max:255',
                        Rule::unique('news')->ignore($id),
                    ],
                    'short_url' => 'url|nullable',
                    'spot' => 'required',
                    'content' => 'required',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                    'meta_tags' => 'string|max:255|nullable',
                    'cuff_photo' => 'image||nullable',
                    'thumbnail' => 'image|nullable',
                    'cuff_direct_link' => 'string|url|nullable',
                    'video_embed' => 'string|nullable',
                    'news_type' => 'integer|nullable',
                    'map_text' => 'max:255|nullable',
                    'hit' => 'integer|nullable',
                    'status' => 'integer|nullable',
                ];
            }
            default:
                break;
        }
    }
}
