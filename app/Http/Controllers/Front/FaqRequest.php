<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'category_id' => 'required',
            'question' => 'required',
            'answer' => 'required'
            
            
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Category field is required',
            'question.required' => 'Question field is required',
            'answer.required' => 'Answer field is required'
            
        ];
    }
}
