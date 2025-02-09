<?php

namespace App\Http\Requests\Movie;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            "title" => ["required", "string"],
            "slug" => ["nullable", "string", "unique:movies,slug"],
            "description" => ["nullable", "string"],
            "poster" => ["nullable", "image", "mimes:png,jpg,jpeg", "max:10240"],
            "trailer_url" => ["nullable", "url"],
            "duration" => ["nullable", "string", "min:1"],
            "release_date" => ["nullable", "date"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "trailer_url" => $this->trailerUrl,
            "release_date" => $this->releaseDate,
        ]);
    }
}
