<?php

namespace App\Modules\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
                    'article_category_ids' => 'required',
                    'user_id' => 'required|integer',
                    'article_author_id' => 'required|integer',
                    'title' => [
                        'max:255',
                        Rule::unique('articles'),
                        'nullable'
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('articles'),
                        'nullable'
                    ],
                    'short_url' => 'url|max:255|nullable',
                    'subtitle' => 'string|max:255|nullable',
                    'spot' => 'string|max:255|nullable',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('article')->id;
                return [
                    'article_category_ids' => 'required',
                    'user_id' => 'required|integer',
                    'article_author_id' => 'required|integer',
                    'title' => [
                        'max:255',
                        Rule::unique('articles')->ignore($id),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('articles')->ignore($id),
                        'nullable'
                    ],
                    'short_url' => 'url|max:255|nullable',
                    'subtitle' => 'string|max:255|nullable',
                    'spot' => 'string|max:255|nullable',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            default:
                break;
        }
    }
}
