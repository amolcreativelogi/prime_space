<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required',
            //'image' => 'required',
            'short_description' => 'required',
            'description' => 'required'
            
            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title field is required',
            //'image.required' => 'Image field is required',
            'short_description.required' => 'Short Description field is required',
            'description.required' => 'Description field is required'
            
        ];
    }
}
