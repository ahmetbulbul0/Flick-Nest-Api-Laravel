<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            "title" => Str::title($this->title),
            "slug" => $this->slug,
            "description" => $this->description,
            "poster" => $this->poster != null ? env("APP_URL") . Storage::url($this->poster) : null,
            "trailerUrl" => $this->trailer_url,
            "duration" => $this->duration,
            "releaseDate" => $this->release_date,
            "rating" => $this->rating,
        ];
    }
}
