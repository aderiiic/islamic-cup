<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;

class TeamPolicy
{
    public function before(User $user, string $ability = null): bool|null
    {
        return $user->isAdmin() ? true : null;
    }

    public function viewAny(User $user): bool
    {
        return $user->isTeamOwner() || $user->isModerator();
    }

    public function view(User $user, Team $team): bool
    {
        return $user->isModerator() || $team->owner_id === $user->id;
    }

    public function create(User $user): bool
    {
        return $user->isTeamOwner() && $user->canCreateTeams();
    }

    public function update(User $user, Team $team): bool
    {
        return $user->isModerator() || $team->owner_id === $user->id;
    }

    public function delete(User $user, Team $team): bool
    {
        return $user->isModerator() || $team->owner_id === $user->id;
    }

    public function approve(User $user): bool
    {
        return $user->isModerator();
    }
}
