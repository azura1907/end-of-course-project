<?php

namespace App\Http\Requests\Admin\Employee;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'dob' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|max:11'
        ];
    }

    public function messages(): array
    {
        return [
            'dob.required' => 'Please input Employee DOB',
            'address.required' => 'Please input Address',
            'address.max' => 'Address max lenght is 255',
            'phone.required' => 'Please input Phone No.',
            'phone.max' => 'Address max lenght is 11'
        ];
    }
}
