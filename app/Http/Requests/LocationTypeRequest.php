<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationTypeRequest extends FormRequest
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
            'location_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'location_type.required' => 'Location type field is required'
        ];
    }
}
