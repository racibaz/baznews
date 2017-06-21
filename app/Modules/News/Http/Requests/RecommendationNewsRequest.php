<?php

namespace App\Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecommendationNewsRequest extends FormRequest
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
                    'user_id'       => 'required',
                    'news_id'       => 'required',
                    'order'         => 'integer|nullable'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'user_id'       => 'required',
                    'news_id'       => 'required',
                    'order'         => 'integer|nullable'
                ];
            }
            default:break;
        }
    }
}
