<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'business_id' => ['required', 'exists:businesses,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'duration_minutes' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function validationData(): array
    {
        // Transform the validated data to match the expected structure
        return [
            'business_id' => $this->input('data.attributes.business_id'),
            'name' => $this->input('data.attributes.name'),
            'description' => $this->input('data.attributes.description'),
            'price' => $this->input('data.attributes.price'),
            'duration_minutes' => $this->input('data.attributes.duration_minutes'),
        ];
    }
}
