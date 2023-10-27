<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (is_auth()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'title' => ['required', 'min:2', 'max:20'],
            'category' => ['required'],
            'is_publish' => ['required'],
            'file' => ['required',
                'image',
//                'mimes:jpeg,png,jpg,gif,svg',
//                Rule::dimensions()->minWidth(496)->minHeight(503)
            ],
            'description' => ['required', 'min:10', 'max:5000', 'string']
        ];
    }
}
