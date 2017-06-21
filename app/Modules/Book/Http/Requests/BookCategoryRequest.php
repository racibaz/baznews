<?php

namespace App\Modules\Book\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookCategoryRequest extends FormRequest
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
                        Rule::unique('book_categories'),

                    ],
                    'slug' => [
                        Rule::unique('book_categories'),
                        'nullable'
                    ],
                    'description'   => 'string|max:255|nullable',
                    'keywords'      => 'string|max:255|nullable',
                    'thumbnail'     => 'image|nullable',
                    'order'         => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('book_category')->id;
                return [
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('book_categories')->ignore($id),

                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('book_categories')->ignore($id),
                        'nullable'
                    ],
                    'description'   => 'string|max:255|nullable',
                    'keywords'      => 'string|max:255|nullable',
                    'thumbnail'     => 'image|nullable',
                    'order'         => 'integer|nullable',
                ];
            }
            default:break;
        }
    }
}
