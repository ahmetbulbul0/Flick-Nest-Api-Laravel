<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPreference extends Model
{
    use HasFactory;

    protected $table = 'user_preferences';

    protected $fillable = [
        'user_id',
        'preferred_language_id',
        'theme',
        'notification_settings',
        'privacy_settings',
        'accessibility_settings',
        'communication_preferences'
    ];

    protected $casts = [
        'notification_settings' => 'json',
        'privacy_settings' => 'json',
        'accessibility_settings' => 'json',
        'communication_preferences' => 'json'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'preferred_language_id');
    }

    public function updateNotificationSettings(array $settings): void
    {
        $this->notification_settings = array_merge(
            $this->notification_settings ?? [],
            $settings
        );
        $this->save();
    }

    public function updatePrivacySettings(array $settings): void
    {
        $this->privacy_settings = array_merge(
            $this->privacy_settings ?? [],
            $settings
        );
        $this->save();
    }

    public function updateAccessibilitySettings(array $settings): void
    {
        $this->accessibility_settings = array_merge(
            $this->accessibility_settings ?? [],
            $settings
        );
        $this->save();
    }

    public function updateCommunicationPreferences(array $preferences): void
    {
        $this->communication_preferences = array_merge(
            $this->communication_preferences ?? [],
            $preferences
        );
        $this->save();
    }

    public function isNotificationEnabled(string $type): bool
    {
        return ($this->notification_settings[$type] ?? false) === true;
    }

    public function isProfilePublic(): bool
    {
        return ($this->privacy_settings['profile_visibility'] ?? 'private') === 'public';
    }

    public function scopeByTheme($query, string $theme)
    {
        return $query->where('theme', $theme);
    }

    public function scopeByLanguage($query, $languageId)
    {
        return $query->where('preferred_language_id', $languageId);
    }

    public function scopeWithNewsletterEnabled($query)
    {
        return $query->whereRaw("JSON_EXTRACT(communication_preferences, '$.newsletter') = true");
    }
}
