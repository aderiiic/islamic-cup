<?php

namespace App\Livewire\Dashboard;

use App\Models\FootballMatch;
use App\Models\Team;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard')]
class Home extends Component
{
    public $upcoming = [];
    public $recentEvents = [];
    public $myTeams = [];

    public function mount(): void
    {
        $user = auth()->user();

        // Mina lag (om lagägare)
        if ($user?->isTeamOwner()) {
            $this->myTeams = Team::where('owner_id', $user->id)
                ->orderByDesc('created_at')
                ->limit(6)
                ->get();
        }

        // Kommande matcher (om admin/mod: alla, annars lagens matcher)
        $matchQuery = FootballMatch::with(['homeTeam','awayTeam'])
            ->where('status', 'scheduled')
            ->orderBy('scheduled_at');

        if ($user?->isTeamOwner()) {
            $teamIds = $user->teams()->pluck('id');
            $matchQuery->where(function($q) use ($teamIds) {
                $q->whereIn('home_team_id', $teamIds)
                    ->orWhereIn('away_team_id', $teamIds);
            });
        }

        $this->upcoming = $matchQuery->limit(6)->get();

        // Senaste händelser (om admin/mod: alla, annars lagens)
        $eventsQuery = \App\Models\MatchEvent::with(['match.homeTeam','match.awayTeam','player','team'])
            ->orderByDesc('created_at');

        if ($user?->isTeamOwner()) {
            $teamIds = $user->teams()->pluck('id');
            $eventsQuery->whereIn('team_id', $teamIds);
        }

        $this->recentEvents = $eventsQuery->limit(8)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.home', [
            'upcoming' => $this->upcoming,
            'recentEvents' => $this->recentEvents,
            'myTeams' => $this->myTeams,
        ]);
    }
}
