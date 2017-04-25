<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
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
                        'min:1',
                        'max:255',
                        Rule::unique('tags'),
                    ],
                    'display_name' => 'max:255',
                    'description' => 'max:255',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('tag')->id;
                return [
                    'name' => [
                        'required',
                        'min:1',
                        'max:255',
                        Rule::unique('tags')->ignore($id),
                    ],
                    'display_name' => 'max:255',
                    'description' => 'max:255',
                ];
            }
            default:break;
        }
    }
}
