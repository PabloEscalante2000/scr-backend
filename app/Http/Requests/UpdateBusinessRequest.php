<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string'],
            'phone' => ['sometimes', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function validationData(): array
    {
        // Transform the validated data to match the expected structure
        return [
            'name' => $this->input('data.attributes.name'),
            'description' => $this->input('data.attributes.description'),
            'phone' => $this->input('data.attributes.phone'),
            'address' => $this->input('data.attributes.address'),
        ];
    }
}
