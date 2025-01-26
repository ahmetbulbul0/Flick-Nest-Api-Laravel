<?php

namespace App\Http\Requests\MovieGenre;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieGenreRequest extends FormRequest
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
            "movie_id" => ["required", "exists:movies,id"],
            "genre_id" => ["required", "exists:genres,id"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "movie_id" => $this->movieId,
            "genre_id" => $this->genreId,
        ]);
    }
}
