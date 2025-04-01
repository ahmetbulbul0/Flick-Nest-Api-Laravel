<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPreferenceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'preferredLanguageId' => $this->preferred_language_id,
            'theme' => $this->theme,
            'notificationSettings' => $this->notification_settings,
            'privacySettings' => $this->privacy_settings,
            'accessibilitySettings' => $this->accessibility_settings,
            'communicationPreferences' => $this->communication_preferences,
            'language' => $this->whenLoaded('language'),
        ];
    }
}
