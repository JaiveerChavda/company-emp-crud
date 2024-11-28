<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|max:255|string|min:3',
            'email' => 'required|email|unique:companies,email',
            'logo' => 'nullable|image',
            'country' => 'required|string|max:125|exists:countries,name',
            'city' => 'required|string|max:125|exists:cities,name',
            'address' => 'required|string',

        ];
    }
}
