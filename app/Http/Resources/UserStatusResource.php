<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserStatusResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'isActive' => $this->is_active,
            'isBanned' => $this->is_banned,
            'bannedAt' => $this->banned_at,
            'banReason' => $this->ban_reason,
            'bannedBy' => $this->banned_by,
            'statusHistory' => $this->status_history,
            'bannedByUser' => $this->whenLoaded('bannedByUser'),
        ];
    }
}
