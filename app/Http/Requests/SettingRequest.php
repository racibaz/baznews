<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
                    'title' => 'max:255',
                    'slogan' => 'max:255|nullable',
                    'description' => 'max:255|nullable',
                    'keywords' => 'max:255|nullable',
                    'logo' => 'image|nullable',
                    'url' => 'url',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('role')->id;
                return [
                    'title' => 'max:255',
                    'slogan' => 'max:255|nullable',
                    'description' => 'max:255|nullable',
                    'keywords' => 'max:255|nullable',
                    'logo' => 'image|nullable',
                    'url' => 'url',
                ];
            }
            default:
                break;
        }
    }
}
