<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
            "birth_date" => ["nullable", "date"],
            "bio" => ["nullable", "string"],
            "profile_photo" => ["nullable"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "birth_date" => $this->birthDate,
        ]);
    }
}
