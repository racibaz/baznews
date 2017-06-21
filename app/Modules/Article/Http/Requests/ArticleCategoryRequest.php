<?php

namespace App\Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleCategoryRequest extends FormRequest
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
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('article_categories'),

                    ],
                    'slug' => [
                        Rule::unique('article_categories'),
                        'nullable',
                    ],
                    'description'   => 'string|max:255|nullable',
                    'keywords'      => 'string|max:255|nullable',
                    'hit'           => 'integer|nullable',
                    'icon'          => 'string|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('article_category')->id;
                return [
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('article_categories')->ignore($id),

                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('article_categories')->ignore($id),
                    ],
                    'description'   => 'string|max:255|nullable',
                    'keywords'      => 'string|max:255|nullable',
                    'hit'           => 'integer|nullable',
                    'icon'          => 'string|nullable',
                ];
            }
            default:break;
        }
    }
}
