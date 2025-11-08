<?php
// app/Livewire/Match/LiveMatch.php

namespace App\Livewire\Match;

use App\Models\FootballMatch;
use App\Models\MatchEvent;
use Livewire\Component;

class LiveMatch extends Component
{
    public $matchId;
    public $match;
    public $events;
    public $currentMinute = 0;
    public $isLive = false;

    protected $listeners = ['refreshMatch' => '$refresh'];

    public function mount($matchId)
    {
        $this->matchId = $matchId;
        $this->loadMatch();
    }

    public function loadMatch()
    {
        $this->match = FootballMatch::with(['homeTeam', 'awayTeam', 'events.player', 'events.team'])->find($this->matchId);
        $this->events = $this->match->events()->latest('minute')->get();
        $this->currentMinute = $this->match->current_minute;
        $this->isLive = $this->match->is_live;
    }

    public function startMatch()
    {
        if (!auth()->user()->canManageMatches()) {
            return;
        }

        $this->match->start();
        $this->loadMatch();
        $this->dispatch('match-started', ['matchId' => $this->matchId]);
    }

    public function pauseMatch()
    {
        if (!auth()->user()->canManageMatches()) {
            return;
        }

        $this->match->pause();
        $this->loadMatch();
        $this->dispatch('match-paused', ['matchId' => $this->matchId]);
    }

    public function resumeMatch()
    {
        if (!auth()->user()->canManageMatches()) {
            return;
        }

        $this->match->resume();
        $this->loadMatch();
        $this->dispatch('match-resumed', ['matchId' => $this->matchId]);
    }

    public function finishMatch()
    {
        if (!auth()->user()->canManageMatches()) {
            return;
        }

        $this->match->finish();
        $this->loadMatch();
        $this->dispatch('match-finished', ['matchId' => $this->matchId]);
    }

    public function updateScore($homeScore, $awayScore)
    {
        if (!auth()->user()->canManageMatches()) {
            return;
        }

        $this->match->updateScore($homeScore, $awayScore);
        $this->loadMatch();
        $this->dispatch('score-updated', ['matchId' => $this->matchId]);
    }

    public function addEvent($eventType, $playerId, $teamId, $minute, $description = null)
    {
        if (!auth()->user()->canManageMatches()) {
            return;
        }

        $this->match->addEvent($eventType, $playerId, $teamId, $minute, $description);
        $this->loadMatch();
        $this->dispatch('event-added', ['matchId' => $this->matchId]);
    }

    public function render()
    {
        return view('livewire.match.live-match');
    }
}
