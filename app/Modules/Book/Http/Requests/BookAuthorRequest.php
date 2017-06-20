<?php

namespace App\Modules\Book\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookAuthorRequest extends FormRequest
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
                    'user_id'           => 'integer|required',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('book_authors'),

                    ],
                    'slug' => [
                        Rule::unique('book_authors'),
                        'nullable'
                    ],
                    'link'          => 'url|max:255|nullable',
                    'thumbnail'     => 'image|nullable',
                    'bio_note'      => 'string|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('book_author')->id;
                return [
                    'user_id'           => 'integer|required',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('book_authors')->ignore($id)

                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('book_authors')->ignore($id),
                        'nullable'
                    ],
                    'link'          => 'url|max:255|nullable',
                    'thumbnail'     => 'image|nullable',
                    'bio_note'      => 'nullable',
                ];
            }
            default:break;
        }
    }
}
