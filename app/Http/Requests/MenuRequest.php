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
                    'parent_id'     => 'integer|nullable',
                    'page_id'       => 'integer|nullable',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('menus'),
                    ],
                    'slug'          => 'string|nullable',
                    '_lft'          => 'integer|nullable',
                    '_rgt'          => 'integer|nullable',
                    'url'           => 'string|max:255|nullable',
                    'route'         => 'max:255|nullable',
                    'target'        => 'max:255|nullable',
                    'icon'          => 'max:255|nullable',
                    'order'         => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('menu')->id;
                return [
                    'parent_id'     => 'integer|nullable',
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('menus')->ignore($id),
                    ],
                    'slug'          => 'string|nullable',
                    '_lft'          => 'integer|nullable',
                    '_rgt'          => 'integer|nullable',
                    'url'           => 'string|max:255|nullable',
                    'route'         => 'max:255|nullable',
                    'target'        => 'max:255|nullable',
                    'icon'          => 'max:255|nullable',
                    'order'         => 'integer|nullable',
                ];
            }
            default:break;
        }
    }
}
