<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $companyId = $this->route('company');
        return [
            'name' => 'required|max:255|string|min:3',
            'email' => ['required','email','max:255',Rule::unique('companies')->ignore($companyId)],
            'logo' => 'nullable|image',
            'country' => 'required|string|max:125|exists:countries,name',
            'city' => 'required|string|max:125|exists:cities,name',
            'address' => 'required|string'
        ];
    }
}
