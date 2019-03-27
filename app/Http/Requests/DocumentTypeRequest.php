<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentTypeRequest extends FormRequest
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
            'document_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'module_manage_id.required' => 'Module Category field is required',
            'document_type.required' => 'Document type field is required'
        ];
    }
}
