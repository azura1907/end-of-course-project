<?php

namespace App\Http\Requests\Admin\Role;

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
            'role_name' => 'required|unique:roles,role_name',
            'status' => 'required:roles,status'
        ];
    }

    public function messages(): array
    {
        return [
            'role_name.required' => 'Please input role name',
            'role_name.unique' => 'This role name is already exists',
            'status.required' => 'Please choose role status'
        ];
    }
}
