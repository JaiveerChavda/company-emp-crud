<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:100|min:2',
            'last_name' => 'required|string|max:100|min:2',
            'profile' => 'nullable|image',
            'company_id' => 'required|integer|exists:companies,id',
            'designation_id' => 'required|integer|exists:designations,id',
            'department_id' => 'required|integer|exists:departments,id',
        ];
    }
}
