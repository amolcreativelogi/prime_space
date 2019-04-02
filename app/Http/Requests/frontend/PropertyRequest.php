<?php

namespace App\Http\Requests\frotend;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
            'module_manage_id' => 'required'
          
            
            
        ];
    }

    public function messages()
    {
        return [
            'module_manage_id.required' => 'Module category field is required'
            
            
        ];
    }
}
