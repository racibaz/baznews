<?php

namespace App\Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleAuthorRequest extends FormRequest
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
                        'max:255'
                    ],
                    'slug' => [
                        Rule::unique('article_authors'),
                    ],
                    'email' => [
                        'string',
                        'Between:3,64',
                        Rule::unique('article_authors'),
                    ],
                    'photo' => [
                        'required',
                        'image'
                    ],
                    'description'  => [
                        'string',
                        'max:255',
                        'nullable'
                    ],
                    'keywords'  => [
                        'string',
                        'max:255',
                        'nullable'
                    ]
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('article_author')->id;
                return [
                    'name' => [
                        'required',
                        'max:255'
                    ],
                    'slug' => [
                        'required',
                        'string',
                        'max:255',
                        Rule::unique('article_authors')->ignore($id),
                    ],
                    'email' => [
                        'required',
                        'string',
                        'Between:3,64',
                        Rule::unique('article_authors')->ignore($id),
                    ],
                    'photo' => [
                        'image',
                    ],
                    'description'  => [
                        'string',
                        'max:255',
                        'nullable'
                    ],
                    'keywords'  => [
                        'string',
                        'max:255',
                        'nullable'
                    ]
                ];
            }
            default:break;
        }
    }
}
