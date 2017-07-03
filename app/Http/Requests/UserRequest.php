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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'language_id' => 'integer|nullable',
                    'country_id' => 'integer|nullable',
                    'city_id' => 'integer|nullable',
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
                    'slug' => 'nullable',
                    'cell_phone' => 'max:255|nullable',
                    'facebook' => 'url|nullable',
                    'twitter' => 'url|nullable',
                    'pinterest' => 'url|nullable',
                    'linkedin' => 'url|nullable',
                    'youtube' => 'url|nullable',
                    'web_site' => 'url|nullable',
                    'sex' => 'nullable',
                    'bio_note' => 'string|nullable',
                    'IP' => 'nullable',
                    'last_login' => 'ip',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('user')->id;
                return [
                    'language_id' => 'integer|nullable',
                    'country_id' => 'integer|nullable',
                    'city_id' => 'integer|nullable',
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
                    'slug' => 'nullable',
                    'cell_phone' => 'max:255|nullable',
                    'facebook' => 'url|nullable',
                    'twitter' => 'url|nullable',
                    'pinterest' => 'url|nullable',
                    'linkedin' => 'url|nullable',
                    'youtube' => 'url|nullable',
                    'web_site' => 'url|nullable',
                    'sex' => 'nullable',
                    'bio_note' => 'string|nullable',
                    'IP' => 'nullable',
                    'last_login' => 'ip',
                ];
            }
            default:
                break;
        }
    }
}