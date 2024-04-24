<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'       => ['required', 'string', 'max:300', 'min:3'],
            'description' => ['required', 'string', 'max:2000', 'min:3'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
        ];
    }


}
