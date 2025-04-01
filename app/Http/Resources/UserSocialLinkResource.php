<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSocialLinkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'platform' => $this->platform,
            'username' => $this->username,
            'url' => $this->url,
            'isVisible' => $this->is_visible,
            'displayOrder' => $this->display_order,
            'icon' => $this->icon,
        ];
    }
}
