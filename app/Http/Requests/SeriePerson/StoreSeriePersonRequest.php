<?php

namespace App\Http\Requests\SeriePerson;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeriePersonRequest extends FormRequest
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
            "serie_id" => ["required", "integer", "exists:series,id"],
            "person_id" => ["required", "integer", "exists:persons,id"],
            "role_id" => ["required", "integer", "exists:person_roles,id"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "serie_id" => $this->serieId,
            "person_id" => $this->personId,
            "role_id" => $this->roleId,
        ]);
    }
}
