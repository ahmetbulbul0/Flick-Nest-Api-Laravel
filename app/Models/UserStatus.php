<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_statuses';

    protected $fillable = [
        'user_id',
        'is_active',
        'is_banned',
        'banned_at',
        'ban_reason',
        'banned_by',
        'status_history'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_banned' => 'boolean',
        'banned_at' => 'datetime',
        'status_history' => 'json'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bannedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'banned_by');
    }

    public function ban(string $reason, $bannedBy = 'system'): void
    {
        $this->addToStatusHistory('banned', $reason, $bannedBy);

        $this->is_banned = true;
        $this->banned_at = now();
        $this->ban_reason = $reason;
        $this->banned_by = $bannedBy;
        $this->save();
    }

    public function unban($unbannedBy = 'system'): void
    {
        $this->addToStatusHistory('unbanned', null, $unbannedBy);

        $this->is_banned = false;
        $this->banned_at = null;
        $this->ban_reason = null;
        $this->banned_by = null;
        $this->save();
    }

    public function activate($activatedBy = 'system'): void
    {
        $this->addToStatusHistory('activated', null, $activatedBy);

        $this->is_active = true;
        $this->save();
    }

    public function deactivate($reason = null, $deactivatedBy = 'system'): void
    {
        $this->addToStatusHistory('deactivated', $reason, $deactivatedBy);

        $this->is_active = false;
        $this->save();
    }

    protected function addToStatusHistory(string $action, ?string $reason, string $by): void
    {
        $history = $this->status_history ?? [];
        array_unshift($history, [
            'action' => $action,
            'reason' => $reason,
            'by' => $by,
            'timestamp' => now()->toDateTimeString()
        ]);

        $this->status_history = array_slice($history, 0, 50); // Keep last 50 status changes
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    public function scopeBanned($query)
    {
        return $query->where('is_banned', true);
    }

    public function scopeNotBanned($query)
    {
        return $query->where('is_banned', false);
    }
}
