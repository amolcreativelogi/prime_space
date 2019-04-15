<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingDurtionTypeRequest extends FormRequest
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
            'booking_duration_type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'module_manage_id.required' => 'Module category field is required',
            'booking_duration_type.required' => 'Booking duration type field is required'
        ];
    }
}
