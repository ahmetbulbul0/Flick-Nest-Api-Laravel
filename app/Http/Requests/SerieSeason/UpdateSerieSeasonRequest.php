<?php

namespace App\Http\Requests\SerieSeason;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSerieSeasonRequest extends FormRequest
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
            "number" => ["required", "integer"],
            "title" => ["nullable", "string", "max:255"],
            "slug" => ["nullable", "string", "max:255", "unique:serie_seasons,slug" . $this->route('serieSeasonId')],
            "description" => ["nullable", "string", "max:255"],
            "poster" => ["nullable", "file"],
            "episodes_count" => ["required", "integer"],
            "release_date" => ["required", "date"],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "episodes_count" => $this->episodesCount,
            "release_date" => $this->releaseDate,
        ]);
    }
}
