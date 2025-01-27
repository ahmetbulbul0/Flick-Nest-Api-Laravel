<?php

namespace App\Http\Requests\SerieGenre;

use Illuminate\Foundation\Http\FormRequest;

class StoreSerieGenreRequest extends FormRequest
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
            "serie_id" => ["required", "exists:series,id"],
            "genre_id" => ["required", "exists:genres,id"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "serie_id" => $this->serieId,
            "genre_id" => $this->genreId,
        ]);
    }
}
