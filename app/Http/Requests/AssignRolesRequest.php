<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignRolesRequest extends FormRequest
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
            'role_id*' => 'required',
            'admin_types' => 'required'
            
            
        ];
    }

    public function messages()
    {
        return [
            'role_id.required' => 'Roles should be checked ',
            'admin_types.required' => 'Admin types field is required'
            
        ];
    }
}
