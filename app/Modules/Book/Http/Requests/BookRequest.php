<?php

namespace App\Modules\Book\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
                    'book_publisher_id' => 'required|integer',
                    'book_author_id' => 'required|integer',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('book_publishers'),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('book_publishers'),
                        'nullable'
                    ],
                    'short_url' => 'url|max:255|nullable',
                    'link' => 'url|max:255|nullable',
                    'thumbnail' => 'image|nullable',
                    'photo' => 'image|nullable',
                    'description' => 'string|nullable',
                    'ISBN' => 'string|nullable',
                    'release_date' => 'date|nullable',
                    'number_of_print' => 'nullable',
                    'skin_type' => 'nullable',
                    'paper_type' => 'nullable',
                    'size' => 'nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('book')->id;
                return [
                    'user_id' => 'required|integer',
                    'book_publisher_id' => 'required|integer',
                    'book_author_id' => 'required|integer',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('book_publishers')->ignore($id),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('book_publishers')->ignore($id),
                        'nullable'
                    ],
                    'short_url' => 'url|max:255|nullable',
                    'link' => 'url|max:255|nullable',
                    'thumbnail' => 'image|nullable',
                    'photo' => 'image|nullable',
                    'description' => 'string|nullable',
                    'ISBN' => 'string|nullable',
                    'release_date' => 'date|nullable',
                    'number_of_print' => 'nullable',
                    'skin_type' => 'nullable',
                    'paper_type' => 'nullable',
                    'size' => 'nullable',
                ];
            }
            default:
                break;
        }
    }
}
