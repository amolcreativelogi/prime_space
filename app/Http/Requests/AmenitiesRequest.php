<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmenitiesRequest extends FormRequest
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
            'module_manage_id' => 'required',
            'amenity_name' => 'required'
            
            
        ];
    }

    public function messages()
    {
        return [
            'module_manage_id.required' => 'Module category field is required',
            'amenity_name.required' => 'Amenity name field is required'
            
        ];
    }
}
