<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
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
            "fullName" => Str::title($this->first_name . " " . $this->last_name),
            "firstName" => Str::title($this->first_name),
            "lastName" => Str::title($this->last_name),
            "birthDaTe" => $this->birth_date,
            "bio" => $this->bio,
            "profilePhoto" => $this->profile_photo
        ];
    }
}
