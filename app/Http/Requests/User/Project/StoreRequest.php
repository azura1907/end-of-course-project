<?php

namespace App\Http\Requests\User\Project;

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
            'project_title' => 'required|min:8|max:255',
            'project_description' => 'required|max:255',
            'project_start_date' => 'required',
            'project_end_date' => 'required',
            'project_estimated_cost' => 'required',
            'project_lead' => 'required',
            'project_category' => 'required',
            'department' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'project_title.required' => 'Please input Project Title',
            'project_title.min' => 'Project Title must be more than 8 chars',
            'project_title.max' => 'Project Title max lenght is no more than 255',
            'project_description' => 'Please input Project Description',
            'project_description.max' => 'Project Description max lenght is no more than 255',
            'project_start_date' => 'Please input Project Start Date',
            'project_end_date' => 'Please input Project End Date',
            'project_estimated_cost' => 'Please input Project Cost',
            'project_lead' => 'Please select Project Lead',
            'project_category' => 'Please select Project Category',
            'department' => 'Please select Project Department'
        ];
    }
}
