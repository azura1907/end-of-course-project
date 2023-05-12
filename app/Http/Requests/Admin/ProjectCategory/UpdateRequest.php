<?php

namespace App\Http\Requests\Admin\ProjectCategory;

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
            'category_name' => 'required',
            'status' => 'required:project_categories,status'
        ];
    }

    public function messages(): array
    {
        return [
            'category_name.required' => 'Please input project category name',
            'status.required' => 'Please choose project category status'
        ];
    }
}
