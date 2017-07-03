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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('article_authors'),

                    ],
                    'slug' => [
                        Rule::unique('article_authors'),
                    ],
                    'email' => [
                        'email',
                        Rule::unique('article_authors'),
                        'nullable'
                    ],
                    'cv' => 'nullable',
                    'photo' => 'image|nullable',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('article_author')->id;
                return [
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('article_authors')->ignore($id),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('article_authors')->ignore($id),
                    ],
                    'email' => [
                        'email',
                        Rule::unique('article_authors')->ignore($id),
                        'nullable',
                    ],
                    'cv' => 'nullable',
                    'photo' => 'image|nullable',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                ];
            }
            default:
                break;
        }
    }
}
