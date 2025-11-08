<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'organization',
        'can_create_multiple_teams',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'can_create_multiple_teams' => 'boolean',
        ];
    }

    // Relationships
    public function teams()
    {
        return $this->hasMany(Team::class, 'owner_id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'author_id');
    }

    // Role checks
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isModerator()
    {
        return $this->role === 'moderator';
    }

    public function isTeamOwner()
    {
        return $this->role === 'team_owner';
    }

    public function canManageMatches()
    {
        return $this->isAdmin() || $this->isModerator();
    }

    public function canCreateTeams()
    {
        if (!$this->isTeamOwner()) return false;

        if ($this->can_create_multiple_teams) return true;

        return $this->teams()->count() === 0;
    }
}
