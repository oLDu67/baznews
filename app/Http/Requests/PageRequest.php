<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
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
                    'name' => 'required',
                    'slug' => [
                        'max:255',
                        Rule::unique('pages'),
                    ],
                    'content' => 'nullable',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                ];
            }
            case 'PUT':
            case 'PATCH': {
                $id = $this->route('page')->id;
                return [
                    'name' => 'required',
                    'slug' => [
                        Rule::unique('pages')->ignore($id),
                    ],
                    'content' => 'nullable',
                    'description' => 'string|max:255|nullable',
                    'keywords' => 'string|max:255|nullable',
                ];
            }
            default:
                break;
        }
    }
}
