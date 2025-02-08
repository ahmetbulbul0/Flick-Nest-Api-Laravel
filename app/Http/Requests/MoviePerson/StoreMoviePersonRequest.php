<?php

namespace App\Http\Requests\MoviePerson;

use Illuminate\Foundation\Http\FormRequest;

class StoreMoviePersonRequest extends FormRequest
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
            "movie_id" => ["required", "integer", "exists:movies,id"],
            "person_id" => ["required", "integer", "exists:persons,id"],
            "role_id" => ["required", "integer", "exists:person_roles,id"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "movie_id" => $this->movieId,
            "person_id" => $this->personId,
            "role_id" => $this->roleId,
        ]);
    }
}
