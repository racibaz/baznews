<?php

namespace App\Modules\Biography\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BiographyRequest extends FormRequest
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
                    'user_id' => 'required|integer',
                    'title' => [
                        'max:255',
                        Rule::unique('biographies'),
                        'nullable'
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('biographies'),
                        'nullable'
                    ],
                    'name' => [
                        'max:255',
                        Rule::unique('biographies'),
                    ],
                    'short_url' => 'url|max:255|nullable',
                    'content' => 'nullable',
                    'photo' => 'image|nullable',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                    'hit' => 'integer|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('biography')->id;
                return [
                    'user_id' => 'required|integer',
                    'title' => [
                        'max:255',
                        Rule::unique('biographies')->ignore($id),
                        'nullable'
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('biographies')->ignore($id),
                        'nullable'
                    ],
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('biographies')->ignore($id),
                    ],
                    'short_url' => 'url|max:255|nullable',
                    'content' => 'nullable',
                    'photo' => 'image|nullable',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                    'hit' => 'integer|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            default:
                break;
        }
    }
}
