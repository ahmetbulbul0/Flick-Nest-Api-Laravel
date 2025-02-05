<?php

namespace App\Http\Requests\Serie;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSerieRequest extends FormRequest
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
            "title" => ["nullable", "string", "max:255", "unique:series,title" . $this->route('serieId')],
            "slug" => ["nullable", "string", "unique:series,slug," . $this->route('serieId')],
            "description" => ["nullable", "string"],
        ];
    }
}
