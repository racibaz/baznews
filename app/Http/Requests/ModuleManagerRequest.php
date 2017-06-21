<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModuleManagerRequest extends FormRequest
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
                        'max:255',
                        Rule::unique('modules'),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('modules'),
                    ],
                    'order' => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('module_manager')->id;
                return [
                    'name' => [
                        'max:255',
                        Rule::unique('modules')->ignore($id),
                    ],
                    'slug' => [
                        'max:255',
                        Rule::unique('modules')->ignore($id),
                    ],
                    'order' => 'integer|nullable',
                ];
            }
            default:break;
        }
    }
}
