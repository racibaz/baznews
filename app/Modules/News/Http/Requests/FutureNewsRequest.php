<?php

namespace App\Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FutureNewsRequest extends FormRequest
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
                    'news_id' => 'required|integer',
                    'future_datetime' => 'required|date',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'news_id' => 'required|integer',
                    'future_datetime' => 'required|date',
                ];
            }
            default:
                break;
        }
    }
}
