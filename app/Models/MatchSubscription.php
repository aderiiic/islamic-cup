<?php
// app/Models/MatchSubscription.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchSubscription extends Model
{
    protected $fillable = [
        'match_id',
        'email',
        'phone',
        'name',
        'email_notifications',
        'sms_notifications',
    ];

    protected function casts(): array
    {
        return [
            'email_notifications' => 'boolean',
            'sms_notifications' => 'boolean',
        ];
    }

    public function match(): BelongsTo
    {
        return $this->belongsTo(FootballMatch::class, 'match_id');
    }
}
