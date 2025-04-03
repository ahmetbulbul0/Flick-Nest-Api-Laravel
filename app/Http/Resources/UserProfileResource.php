<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'fullName' => $this->full_name,
            'birthDate' => $this->birth_date,
            'age' => $this->age,
            'gender' => $this->gender,
            'nationality' => $this->nationality,
            'phoneNumber' => $this->phone_number,
            'profilePhoto' => $this->profile_photo,
            'biography' => $this->biography,
            'additionalInfo' => $this->additional_info,
            'country' => $this->whenLoaded('country'),
        ];
    }
}
