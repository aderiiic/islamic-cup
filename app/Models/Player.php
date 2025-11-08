<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    protected $fillable = [
        'team_id',
        'name',
        'email',
        'phone',
        'position',
        'jersey_number',
        'birth_date',
        'is_captain',
    ];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'is_captain' => 'boolean',
        ];
    }

    // Relationships
    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function matchEvents(): HasMany
    {
        return $this->hasMany(MatchEvent::class);
    }

    // Accessors
    public function getAgeAttribute()
    {
        return $this->birth_date ? $this->birth_date->age : null;
    }

    public function getGoalsAttribute()
    {
        return $this->matchEvents()->where('event_type', 'goal')->count();
    }

    public function getYellowCardsAttribute()
    {
        return $this->matchEvents()->where('event_type', 'yellow_card')->count();
    }

    public function getRedCardsAttribute()
    {
        return $this->matchEvents()->where('event_type', 'red_card')->count();
    }

    // Scopes
    public function scopeCaptains($query)
    {
        return $query->where('is_captain', true);
    }

    public function scopeByPosition($query, $position)
    {
        return $query->where('position', $position);
    }
}
