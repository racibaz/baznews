<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
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
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('permissions'),
                    ],
                    'display_name' => 'max:255|nullable',
                    'description' => 'max:255|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('permission')->id;
                return [
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('permissions')->ignore($id),
                    ],
                    'display_name' => 'max:255|nullable',
                    'description' => 'max:255|nullable',
                ];
            }
            default:
                break;
        }
    }
}
