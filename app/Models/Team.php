<?php
// app/Models/Team.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $fillable = [
        'name',
        'organization',
        'description',
        'logo_path',
        'color_primary',
        'color_secondary',
        'owner_id',
        'captain_id',
        'status',
        'group_number',
    ];

    // Relationships
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function captain(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'captain_id');
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function homeMatches(): HasMany
    {
        return $this->hasMany(FootballMatch::class, 'home_team_id');
    }

    public function awayMatches(): HasMany
    {
        return $this->hasMany(FootballMatch::class, 'away_team_id');
    }

    public function matches()
    {
        return $this->homeMatches()->unionAll($this->awayMatches());
    }

    public function matchEvents(): HasMany
    {
        return $this->hasMany(MatchEvent::class);
    }

    // Accessors & Mutators
    public function getLogoUrlAttribute()
    {
        return $this->logo_path
            ? asset('storage/' . $this->logo_path)
            : asset('images/default-team-logo.png');
    }

    // Team stats calculations
    public function getStatsAttribute()
    {
        $stats = [
            'played' => 0,
            'won' => 0,
            'drawn' => 0,
            'lost' => 0,
            'goals_for' => 0,
            'goals_against' => 0,
            'goal_difference' => 0,
            'points' => 0,
        ];

        $matches = FootballMatch::where(function($query) {
            $query->where('home_team_id', $this->id)
                ->orWhere('away_team_id', $this->id);
        })->where('status', 'finished')->get();

        foreach ($matches as $match) {
            $stats['played']++;

            if ($match->home_team_id === $this->id) {
                $stats['goals_for'] += $match->home_score;
                $stats['goals_against'] += $match->away_score;

                if ($match->home_score > $match->away_score) {
                    $stats['won']++;
                    $stats['points'] += 3;
                } elseif ($match->home_score < $match->away_score) {
                    $stats['lost']++;
                } else {
                    $stats['drawn']++;
                    $stats['points'] += 1;
                }
            } else {
                $stats['goals_for'] += $match->away_score;
                $stats['goals_against'] += $match->home_score;

                if ($match->away_score > $match->home_score) {
                    $stats['won']++;
                    $stats['points'] += 3;
                } elseif ($match->away_score < $match->home_score) {
                    $stats['lost']++;
                } else {
                    $stats['drawn']++;
                    $stats['points'] += 1;
                }
            }
        }

        $stats['goal_difference'] = $stats['goals_for'] - $stats['goals_against'];

        return $stats;
    }

    // Status checks
    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }
}
