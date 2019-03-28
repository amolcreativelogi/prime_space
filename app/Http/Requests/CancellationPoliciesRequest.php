<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CancellationPoliciesRequest extends FormRequest
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
            'cancellation_type_id'=>'required',
            'cancellation_policy_text' => 'required',
            'cancellation_percentage' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'module_manage_id.required' => 'Module Category field is required',
            'cancellation_type_id.required' => 'Cancellation Type field is required',
            'cancellation_policy_text.required' => 'Cancellation Policy field is required',
            'cancellation_percentage' => 'Cancellation Policy value should be in decimal'
        ];
    }
}
