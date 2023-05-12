<?php

namespace App\Http\Requests\Admin\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|min:8',
            'entry_date' => 'required',
            'fullname' => 'required',
            'skills' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'email.email' => 'Wrong email format. Please check and input again.',
            'password.required' => 'Please input password',
            'password.min' => 'Please input at least 8 chars for password',
            'entry_date.required' => 'Please input employee entry date',
            'fullname.required' => 'Please input employee fullname',
            'skills.required' => 'Please select employee skills'
        ];
    }
}
