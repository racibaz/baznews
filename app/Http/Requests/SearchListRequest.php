<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchListRequest extends FormRequest
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
                    'class_path' => 'required|string|max:255',
                    'field' => 'required|string|max:255',
                    'route_name' => 'string|max:255|nullable',
                    'module_slug' => 'string|max:255|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'class_path' => 'required|string|max:255',
                    'field' => 'required|string|max:255',
                    'route_name' => 'string|max:255|nullable',
                    'module_slug' => 'string|max:255|nullable',
                ];
            }
            default:
                break;
        }
    }
}
