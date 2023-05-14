<?php

namespace App\Http\Requests\User\Project;

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
            'project_title' => 'required|min:8|max:255',
            'project_description' => 'max:255',
            'project_start_date' => 'required|before_or_equal:project_end_date',
            'project_end_date' => 'required|after_or_equal:project_start_date',
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
            'project_description.max' => 'Project Description max lenght is no more than 255',
            'project_start_date.required' => 'Please input Project Start Date',
            'project_start_date.before_or_equal' => 'Start Date has to be before or equal with End Date',
            'project_end_date.required' => 'Please input Project End Date',
            'project_end_date.after_or_equal' => 'End Date has to be after or equal with Start Date',
            'project_estimated_cost.required' => 'Please input Project Cost',
            'project_lead.required' => 'Please select Project Lead',
            'project_category.required' => 'Please select Project Category',
            'department.required' => 'Please select Project Department'
        ];
    }
}
