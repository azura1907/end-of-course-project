<?php

namespace App\Http\Requests\Admin\Role;

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
            'role_name' => 'required',
            'status' => 'required:roles,status',
            'view_right' => 'required:role,view_rights'
        ];
    }

    public function messages(): array
    {
        return [
            'role_name.required' => 'Please input role name',
            'status.required' => 'Please choose role status',
            'view_right.required' => 'Please choose role view rights'
        ];
    }
}
