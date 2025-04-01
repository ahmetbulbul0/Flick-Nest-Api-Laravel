<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $item = [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
        ];

        if ($this->relationLoaded('profile')) {
            $item['profile'] = new UserProfileResource($this->profile);
        }

        if ($this->relationLoaded('security')) {
            $item['security'] = new UserSecurityResource($this->security);
        }

        if ($this->relationLoaded('status')) {
            $item['status'] = new UserStatusResource($this->status);
        }

        if ($this->relationLoaded('preferences')) {
            $item['preferences'] = new UserPreferenceResource($this->preferences);
        }

        if ($this->relationLoaded('socialLinks')) {
            $item['socialLinks'] = UserSocialLinkResource::collection($this->socialLinks);
        }

        if ($this->relationLoaded('roles')) {
            $item['roles'] = RoleResource::collection($this->roles);
        }

        return $item;
    }
}
