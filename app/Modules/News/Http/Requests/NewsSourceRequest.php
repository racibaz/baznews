<?php

namespace App\Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsSourceRequest extends FormRequest
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
                        Rule::unique('news_sources'),
                    ],
                    'url'                   => 'url|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                $id = $this->route('news_source')->id;
                return [
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('news_sources')->ignore($id),
                    ],
                    'url'                   => 'url|nullable',
                ];
            }
            default:break;
        }
    }
}
