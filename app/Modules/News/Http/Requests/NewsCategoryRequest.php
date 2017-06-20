<?php

namespace App\Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsCategoryRequest extends FormRequest
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
                    '_lft'                  => 'integer|nullable',
                    '_rgt'                  => 'integer|nullable',
                    'parent_id'             => 'integer|nullable',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('news_categories'),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('news_categories'),
                        'nullable'
                    ],
                    'thumbnail'             => 'image|nullable',
                    'description'           => 'string|max:255|nullable',
                    'keywords'              => 'string|max:255|nullable',
                    'hit'                   => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('news_category')->id;
                return [
                    '_lft'                  => 'integer|nullable',
                    '_rgt'                  => 'integer|nullable',
                    'parent_id'             => 'integer|nullable',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('news_categories')->ignore($id),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('news_categories')->ignore($id),
                    ],
                    'thumbnail'             => 'image|nullable',
                    'description'           => 'string|max:255|nullable',
                    'keywords'              => 'string|max:255|nullable',
                    'hit'                   => 'integer|nullable',
                ];
            }
            default:break;
        }
    }
}
