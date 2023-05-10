<?php

namespace App\Http\Requests\Admin\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|unique:employees,email',
            // 'password' => 'required|min:8|confirmed',
            'entry_date' => 'required:employees,entry_date',
            'fullname' => 'required:employees,fullname',
            'skills' => 'required:employee_skills,skills'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please input email',
            'email.unique' => 'This email is already exists',
            'email.email' => 'Wrong email format. Please check and input again.',
            'password.required' => 'Please input password',
            // 'password.confirmed' => 'Password and confirm password are not match. Please check and input again.'
        ];
    }
}
