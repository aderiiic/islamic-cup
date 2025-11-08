<?php
// app/Livewire/Dashboard/TeamOwner.php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\FootballMatch;

class TeamOwner extends Component
{
    public $user;
    public $teams;
    public $upcomingMatches;
    public $recentMatches;

    public function mount()
    {
        $this->user = auth()->user();
        $this->loadData();
    }

    public function loadData()
    {
        $this->teams = $this->user->teams()->with(['players', 'homeMatches', 'awayMatches'])->get();

        $teamIds = $this->user->teams->pluck('id');

        $this->upcomingMatches = FootballMatch::with(['homeTeam', 'awayTeam'])
            ->where(function($query) use ($teamIds) {
                $query->whereIn('home_team_id', $teamIds)
                    ->orWhereIn('away_team_id', $teamIds);
            })
            ->upcoming()
            ->orderBy('scheduled_at')
            ->limit(5)
            ->get();

        $this->recentMatches = FootballMatch::with(['homeTeam', 'awayTeam'])
            ->where(function($query) use ($teamIds) {
                $query->whereIn('home_team_id', $teamIds)
                    ->orWhereIn('away_team_id', $teamIds);
            })
            ->finished()
            ->orderBy('finished_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.team-owner');
    }
}
