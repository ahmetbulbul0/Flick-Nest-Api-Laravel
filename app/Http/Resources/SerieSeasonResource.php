<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieSeasonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "serieId" => $this->serie_id,
            "number" => $this->number,
            "title" => Str::title($this->title),
            "slug" => $this->slug,
            "description" => $this->description,
            "poster" => $this->poster,
            "episodesCount" => $this->episodes_count,
            "releaseDate" => $this->release_date,
        ];
    }
}
