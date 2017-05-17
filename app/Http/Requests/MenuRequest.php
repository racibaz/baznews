<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
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
                        'max:255',
                        Rule::unique('menus'),
                    ],
                    '_lft' => 'integer',
                    '_rgt' => 'integer',
                    'page_id' => 'integer|nullable',
                    'url'   => 'url|max:255|nullable',
                    'route'   => 'max:255|nullable',
                    'icon' => 'max:255|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('menu')->id;
                return [
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('menus')->ignore($id),
                    ],
                    '_lft' => 'integer',
                    '_rgt' => 'integer',
                    'page_id' => 'integer|nullable',
                    'url'   => 'url|max:255|nullable',
                    'route'   => 'max:255|nullable',
                    'icon' => 'max:255|nullable',
                    'order' => 'integer|nullable',
                ];
            }
            default:break;
        }
    }
}
