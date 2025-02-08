<?php

namespace App\Http\Requests\PersonRole;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRoleRequest extends FormRequest
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
            "name" => ["nullable", "string", "unique:person_roles,name," . $this->route('personRoleId')],
            "slug" => ["nullable", "string", "unique:person_roles,slug," . $this->route('personRoleId')]
        ];
    }
}
