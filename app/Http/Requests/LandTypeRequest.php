<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandTypeRequest extends FormRequest
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
        return [
            'land_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'land_type.required' => 'Land type field is required'
        ];
    }
}
