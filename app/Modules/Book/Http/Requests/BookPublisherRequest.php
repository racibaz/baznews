<?php

namespace App\Modules\Book\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookPublisherRequest extends FormRequest
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
                    'name' => [
                        'max:255',
                        Rule::unique('book_publishers'),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('book_publishers'),
                        'nullable'
                    ],
                    'link' => 'url|max:255|nullable',
                    'description' => 'string|max:255|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('book_publisher')->id;
                return [
                    'user_id' => 'required|integer',
                    'name' => [
                        'max:255',
                        Rule::unique('book_publishers')->ignore($id),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('book_publishers')->ignore($id),
                        'nullable'
                    ],
                    'link' => 'url|max:255|nullable',
                    'description' => 'string|max:255|nullable',
                ];
            }
            default:
                break;
        }
    }
}
