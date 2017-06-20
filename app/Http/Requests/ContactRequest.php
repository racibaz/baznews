<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
                    'contact_type_id' => 'required|integer',
                    'full_name'       => 'required|min:3|max:255',
                    'subject'         => 'required|min:3|max:255',
                    'email'           => 'required|email|max:255',
                    'content'         => 'required|string',
                    'phone'           => 'max:17|nullable',
                    'status'          => 'nullable',
                    'IP'              => 'ip'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'contact_type_id' => 'required|integer',
                    'full_name'       => 'required|min:3|max:255',
                    'subject'         => 'required|min:3|max:255',
                    'email'           => 'required|email|max:255',
                    'content'         => 'required|string',
                    'phone'           => 'max:17|nullable',
                    'status'          => 'nullable',
                    'IP'              => 'ip'
                ];
            }
            default:break;
        }
    }
}
