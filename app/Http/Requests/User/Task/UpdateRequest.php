<?php

namespace App\Http\Requests\User\Task;

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
            'task_name' => 'required|min:8|max:255',
            'task_description' => 'required|max:255',
            'task_start_date' => 'required',
            'task_end_date' => 'required',
            'task_estimated_cost' => 'required|max:99999999999',
            'assignee' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'task_name.required' => 'Please input Task Title',
            'task_name.min' => 'Task Title must be more than 8 chars',
            'task_name.max' => 'Task Title max lenght is no more than 99,999,999,999',
            'task_description' => 'Please input Task Description',
            'task_description.max' => 'Task description max lenght is 255 chars',
            'task_start_date' => 'Please input task Start Date',
            'task_end_date' => 'Please input task End Date',
            'task_estimated_cost' => 'Please input task Cost',
            'task_estimated_cost.max' => 'Cost max value is 99,999,999,999',
            'task_lead' => 'Please select task Lead',
            'task_category' => 'Please select task Category',
            'task_department' => 'Please select task Department'
        ];
    }
}
