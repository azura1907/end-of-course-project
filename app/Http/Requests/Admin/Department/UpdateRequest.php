<?php

namespace App\Http\Requests\Admin\Department;

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
            'department_name' => 'required',
            'status' => 'required:skills,status'
        ];
    }

    public function messages(): array
    {
        return [
            'department_name.required' => 'Please input department name',
            'status.required' => 'Please choose department status'
        ];
    }
}
