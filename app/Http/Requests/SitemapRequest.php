<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SitemapRequest extends FormRequest
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
                        Rule::unique('sitemaps'),
                    ],
                    'url' => [
                        'required',
                        'url',
                        Rule::unique('sitemaps'),
                    ],
                    'last_modified' => 'required|date',
                    'order' => 'integer|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('sitemap')->id;
                return [
                    'name' => [
                        'required',
                        'max:255',
                        Rule::unique('sitemaps')->ignore($id),
                    ],
                    'url' => [
                        'required',
                        'url',
                        Rule::unique('sitemaps')->ignore($id),
                    ],
                    'last_modified' => 'required|date',
                    'order' => 'integer|nullable',
                ];
            }
            default:
                break;
        }
    }
}
