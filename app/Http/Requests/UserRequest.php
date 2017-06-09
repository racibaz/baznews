<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
                    'email' => [
                        'required',
                        'string',
                        'Between:3,64',
                        Rule::unique('users'),
                    ],
                    'password' => [
                        'required',
                        'min:4',
                        'Confirmed'
                    ],
                    'password_confirmation' => [
                        'required',
                        'min:4'
                    ],
                    'web_site'  => 'url|nullable',
                    'avatar' => [
                        'image',
                        'max:255'
                    ],
                    'bio_note'  => [
                        'string'
                    ]
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('user')->id;
                return [
                    'name' => [
                        'required',
                        'max:255'
                    ],
                    'email' => [
                        'required',
                        'string',
                        'Between:3,64',
                        Rule::unique('users')->ignore($id),
                    ],
                    'password'                      => 'min:4|Confirmed|nullable',
                    'password_confirmation'         => 'min:4|same:password|nullable',
                    'web_site'  => 'url|nullable',
                    'avatar' => [
                        'image',
                        'max:255'
                    ],
                    'bio_note'  => [
                        'string'
                    ]
                ];
            }
            default:break;
        }
    }
}