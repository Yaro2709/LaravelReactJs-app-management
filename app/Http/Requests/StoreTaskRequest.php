<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => [
                'required',
                'string',
                Rule::in(['pending', 'in_progress', 'completed'])
            ],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'due_date' => ['required', 'date'],
            'priority' => [
                'required',
                'string',
                Rule::in(['low', 'medium', 'high'])
            ],
            'project_id' => ['required', 'exists:projects,id'],
            'assigned_user_id' => ['nullable', 'exists:users,id'],
        ];
    }
}
