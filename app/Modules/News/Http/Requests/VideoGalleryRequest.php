<?php

namespace App\Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VideoGalleryRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'video_category_id'         => 'integer|nullable',
                    'user_id'                   => 'required|integer',
                    'title' => [
                        'required',
                        'max:255',
                        Rule::unique('video_galleries'),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('video_galleries'),
                        'nullable'
                    ],
                    'short_url'                 => 'url|nullable',
                    'description'               => 'string|max:255|nullable',
                    'keywords'                  => 'string|max:255|nullable',
                    'thumbnail'                 => 'image|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('video_gallery')->id;
                return [
                    'video_category_id'         => 'integer|nullable',
                    'user_id'                   => 'required|integer',
                    'title' => [
                        'required',
                        'max:255',
                        Rule::unique('video_galleries')->ignore($id),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('video_galleries')->ignore($id),
                    ],
                    'short_url'                 => 'url|nullable',
                    'description'               => 'string|max:255|nullable',
                    'keywords'                  => 'string|max:255|nullable',
                    'thumbnail'                 => 'image|nullable',
                ];
            }
            default:break;
        }
    }
}
