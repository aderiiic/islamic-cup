<?php
// app/Models/FootballMatch.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FootballMatch extends Model
{
    protected $table = 'matches'; // Behåller tabellnamnet

    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'group_number',
        'match_type',
        'scheduled_at',
        'venue',
        'duration_minutes',
        'status',
        'home_score',
        'away_score',
        'home_score_ht',
        'away_score_ht',
        'started_at',
        'half_time_at',
        'finished_at',
        'current_minute',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'started_at' => 'datetime',
            'half_time_at' => 'datetime',
            'finished_at' => 'datetime',
        ];
    }

    // Relationships
    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(MatchEvent::class, 'match_id');
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(MatchSubscription::class, 'match_id');
    }

    // Accessors
    public function getIsLiveAttribute()
    {
        return $this->status === 'live';
    }

    public function getComputedMinuteAttribute(): int
    {
        if ($this->status === 'finished') {
            return (int) ($this->duration_minutes ?? 90);
        }

        if ($this->status === 'live' && $this->started_at) {
            $dbMinute = (int) ($this->current_minute ?? 0);
            $runtime = $this->started_at->diffInMinutes(now());

            return max($dbMinute, $runtime);
        }

        return (int) ($this->current_minute ?? 0);
    }


    public function getDisplayMinuteAttribute(): int
    {
        if ($this->status === 'finished') {
            return (int) ($this->duration_minutes ?? 90);
        }

        if ($this->status === 'live' && $this->started_at) {
            $dbMinute = (int) ($this->current_minute ?? 0);
            $runtime = $this->started_at->diffInMinutes(now());

            return max($dbMinute, $runtime);
        }

        return (int) ($this->current_minute ?? 0);
    }

    public function syncCurrentMinuteFromStart(): void
    {
        if ($this->status === 'live' && $this->started_at) {
            // Räkna från started_at till now (positivt värde)
            $minute = $this->started_at->diffInMinutes(now());

            if ((int) ($this->current_minute ?? 0) !== $minute) {
                $this->update(['current_minute' => $minute]);
            }
        }
    }

    public function getIsFinishedAttribute()
    {
        return $this->status === 'finished';
    }

    public function getWinnerAttribute()
    {
        if (!$this->is_finished) return null;

        if ($this->home_score > $this->away_score) {
            return $this->homeTeam;
        } elseif ($this->away_score > $this->home_score) {
            return $this->awayTeam;
        }

        return null; // Draw
    }

    public function getResultAttribute()
    {
        return $this->home_score . ' - ' . $this->away_score;
    }

    // Match control methods
    public function start()
    {
        $this->update([
            'status' => 'live',
            'started_at' => now(),
            'current_minute' => 0,
        ]);
    }

    public function pause()
    {
        $this->update(['status' => 'half_time']);
    }

    public function resume()
    {
        $this->update(['status' => 'live']);
    }

    public function finish()
    {
        $this->update([
            'status' => 'finished',
            'finished_at' => now(),
            'current_minute' => $this->duration_minutes,
        ]);
    }

    public function addEvent($eventType, $playerId, $teamId, $minute, $description = null)
    {
        return $this->events()->create([
            'player_id' => $playerId,
            'team_id' => $teamId,
            'event_type' => $eventType,
            'minute' => $minute,
            'description' => $description,
        ]);
    }

    public function updateScore($homeScore, $awayScore)
    {
        $this->update([
            'home_score' => $homeScore,
            'away_score' => $awayScore,
        ]);
    }

    // Scopes
    public function scopeLive($query)
    {
        return $query->where('status', 'live');
    }

    public function scopeFinished($query)
    {
        return $query->where('status', 'finished');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'scheduled')
            ->where('scheduled_at', '>', now());
    }

    public function scopeByGroup($query, $groupNumber)
    {
        return $query->where('group_number', $groupNumber);
    }

    public function scopeGroupMatches($query)
    {
        return $query->where('match_type', 'group');
    }

    public function scopeKnockoutMatches($query)
    {
        return $query->whereIn('match_type', ['quarter_final', 'semi_final', 'final', 'third_place']);
    }
}
