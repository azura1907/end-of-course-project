<?php

namespace App\Http\Requests\User\Task;

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
            'task_name' => 'required|min:8|max:255',
            'task_description' => 'required|max:255',
            'task_start_date' => 'required|before_or_equal:task_end_date',
            'task_end_date' => 'required|after_or_equal:task_start_date',
            'task_estimated_cost' => 'required|lt:100|numeric',
            'assignee' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'task_name.required' => 'Please input Task Title',
            'task_name.min' => 'Task Title must be more than 8 chars',
            'task_name.max' => 'Task Title max lenght is no more than 255 chars',
            'task_description.required' => 'Please input Task Description',
            'task_description.max' => 'Task description max lenght is 255 chars',
            'task_start_date.required' => 'Please input task Start Date',
            'task_end_date.required' => 'Please input task End Date',
            'task_start_date.before_or_equal' => 'Start Date has to be before or equal with End Date',
            'task_end_date.after_or_equal' =>  'End Date has to be after or equal with Start Date',
            'task_estimated_cost.required' => 'Please input Task Cost',
            'task_estimated_cost.lt' => 'Cost max value is 100',
            'task_estimated_cost.numeric' => 'Please input Cost with number only',
            'task_lead.required' => 'Please select task Lead',
            'task_category.required' => 'Please select task Category',
            'task_department.required' => 'Please select task Department'
        ];
    }
}
