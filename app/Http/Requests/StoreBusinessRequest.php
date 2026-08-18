<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function validationData(): array
    {
        // Transform the validated data to match the expected structure
        return [
            'user_id' => $this->input('data.attributes.user_id'),
            'name' => $this->input('data.attributes.name'),
            'description' => $this->input('data.attributes.description'),
            'phone' => $this->input('data.attributes.phone'),
            'address' => $this->input('data.attributes.address'),
        ];
    }
}
