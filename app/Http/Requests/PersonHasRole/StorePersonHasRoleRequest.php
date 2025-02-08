<?php

namespace App\Http\Requests\PersonHasRole;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonHasRoleRequest extends FormRequest
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
            "person_id" => ["required", "exists:persons,id"],
            "role_id" => ["required", "exists:person_roles,id"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "person_id" => $this->personId,
            "role_id" => $this->roleId,
        ]);
    }
}
