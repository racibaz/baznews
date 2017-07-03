<?php

namespace App\Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhotoRequest extends FormRequest
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
                    'photo_gallery_id' => 'integer|nullable',
                    'name' => [
                        'required',
                        Rule::unique('photos'),
                    ],
                    'slug' => [
                        Rule::unique('photos'),
                        'nullable',
                    ],
                    'subtitle' => 'string|max:255|nullable',
                    'file' => 'image|nullable',
                    'link' => 'url|max:255|nullable',
                    'content' => 'nullable',
                    'keywords' => 'string|max:255|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('photo')->id;
                return [
                    'photo_gallery_id' => 'integer|nullable',
                    'name' => [
                        'required',
                        Rule::unique('photos')->ignore($id),
                    ],
                    'slug' => [
                        'maz:255',
                        Rule::unique('photos')->ignore($id),
                    ],
                    'subtitle' => 'string|max:255|nullable',
                    'file' => 'image|nullable',
                    'link' => 'url|max:255|nullable',
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
