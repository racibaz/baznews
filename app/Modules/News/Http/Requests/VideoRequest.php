<?php

namespace App\Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VideoRequest extends FormRequest
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
                    'video_category_id' => 'integer|nullable',
                    'video_gallery_id' => 'integer|nullable',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('videos'),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('videos'),
                        'nullable',
                    ],
                    'subtitle' => 'string|max:255|nullable',
                    'thumbnail' => 'image|nullable',
                    'file' => 'nullable',
                    'link' => 'url|max:255|nullable',
                    'embed' => 'nullable',
                    'content' => 'nullable',
                    'keywords' => 'string|max:255|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('video')->id;
                return [
                    'video_category_id' => 'integer|nullable',
                    'video_gallery_id' => 'integer|nullable',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('videos')->ignore($id),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('videos')->ignore($id),
                    ],
                    'subtitle' => 'string|max:255|nullable',
                    'thumbnail' => 'image|nullable',
                    'file' => 'nullable',
                    'link' => 'url|max:255|nullable',
                    'embed' => 'nullable',
                    'content' => 'nullable',
                    'keywords' => 'string|max:255|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            default:
                break;
        }
    }
}
