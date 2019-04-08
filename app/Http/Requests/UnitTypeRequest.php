<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitTypeRequest extends FormRequest
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
            'module_manage_id'=>'required',
            'unit_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'module_manage_id.required' => 'Module Category field is required',
            'unit_type.required' => 'Unit type field is required'
        ];
    }
}
