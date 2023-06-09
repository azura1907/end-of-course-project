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
            'entry_date' => 'required',
            'fullname' => 'required',
            'skills' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'entry_date.required' => 'Please input employee entry date',
            'fullname.required' => 'Please input employee fullname',
            'skills.required' => 'Please select employee skills'
        ];
    }
}
