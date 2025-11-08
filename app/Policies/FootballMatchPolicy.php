<?php

namespace App\Policies;

use App\Models\FootballMatch;
use App\Models\User;

class FootballMatchPolicy
{
    public function before(User $user, string $ability = null): bool|null
    {
        return $user->isAdmin() ? true : null;
    }

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, FootballMatch $match): bool
    {
        return true;
    }

    public function manage(User $user, FootballMatch $match): bool
    {
        return $user->isModerator();
    }
}
