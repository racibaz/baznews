<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    //todo request yapılması gerekiyor mu?
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'                    => 'required|max:255',
            'last_name'                     => 'required|max:255',
            'email'                         => 'required|Between:3,64|email|Unique:users',
            'password'                      => 'required|min:4|Confirmed',
            'password_confirmation'         => 'required|min:4',
        ];
    }
}
