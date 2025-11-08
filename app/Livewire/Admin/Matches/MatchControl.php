<?php

namespace App\Livewire\Admin\Matches;

use App\Models\FootballMatch;
use App\Models\MatchEvent;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard')]
class MatchControl extends Component
{
    public FootballMatch $match;

    // Event form
    public $event_type = 'goal';
    public $minute = null;
    public $team_id = null;
    public $player_id = null;
    public $description = '';

    // Lägg till denna så den alltid finns
    public $editingEventId = null;

    public function mount(FootballMatch $match): void
    {
        abort_unless(Gate::allows('moderate'), 403);
        $this->match = $match->load(['homeTeam.players','awayTeam.players','events.player','events.team']);
    }

    protected function rules(): array
    {
        return [
            'event_type' => 'required|in:goal,assist,yellow_card,red_card,send_off,motm',
            'minute' => 'nullable|integer|min:0|max:150',
            'team_id' => 'required|integer|in:' . $this->match->home_team_id . ',' . $this->match->away_team_id,
            'player_id' => 'nullable|integer|exists:players,id',
            'description' => 'nullable|string|max:500',
        ];
    }

    public function start(): void { abort_unless(Gate::allows('moderate'), 403); $this->match->start(); $this->match->refresh(); }
    public function pause(): void { abort_unless(Gate::allows('moderate'), 403); $this->match->pause(); $this->match->refresh(); }
    public function resume(): void { abort_unless(Gate::allows('moderate'), 403); $this->match->resume(); $this->match->refresh(); }
    public function finish(): void { abort_unless(Gate::allows('moderate'), 403); $this->match->finish(); $this->match->refresh(); }

    public function addEvent(): void
    {
        abort_unless(Gate::allows('moderate'), 403);
        $this->validate($this->rules());

        $minute = $this->minute ?? $this->match->current_minute ?? 0;

        $this->match->events()->create([
            'player_id' => $this->player_id,
            'team_id' => $this->team_id,
            'event_type' => $this->event_type,
            'minute' => $minute,
            'description' => $this->description,
        ]);

        if ($this->event_type === 'goal') {
            $homeGoals = $this->match->events()->where('event_type','goal')->where('team_id',$this->match->home_team_id)->count();
            $awayGoals = $this->match->events()->where('event_type','goal')->where('team_id',$this->match->away_team_id)->count();
            $this->match->updateScore($homeGoals, $awayGoals);
        }

        $this->resetForm();
        $this->match->refresh();
    }

    public function editEvent(int $id): void
    {
        abort_unless(Gate::allows('moderate'), 403);
        $ev = $this->match->events()->findOrFail($id);
        $this->editingEventId = $ev->id;
        $this->event_type = $ev->event_type;
        $this->minute = $ev->minute;
        $this->team_id = $ev->team_id;
        $this->player_id = $ev->player_id;
        $this->description = $ev->description;
    }

    public function updateEvent(): void
    {
        abort_unless(Gate::allows('moderate'), 403);
        if (!$this->editingEventId) return;

        $this->validate($this->rules());

        $ev = $this->match->events()->findOrFail($this->editingEventId);
        $ev->update([
            'player_id' => $this->player_id,
            'team_id' => $this->team_id,
            'event_type' => $this->event_type,
            'minute' => $this->minute ?? 0,
            'description' => $this->description,
        ]);

        if ($this->event_type === 'goal') {
            $homeGoals = $this->match->events()->where('event_type','goal')->where('team_id',$this->match->home_team_id)->count();
            $awayGoals = $this->match->events()->where('event_type','goal')->where('team_id',$this->match->away_team_id)->count();
            $this->match->updateScore($homeGoals, $awayGoals);
        }

        $this->resetForm();
        $this->match->refresh();
    }

    public function deleteEvent(int $id): void
    {
        abort_unless(Gate::allows('moderate'), 403);
        $ev = $this->match->events()->findOrFail($id);
        $wasGoal = $ev->event_type === 'goal';
        $ev->delete();

        if ($wasGoal) {
            $homeGoals = $this->match->events()->where('event_type','goal')->where('team_id',$this->match->home_team_id)->count();
            $awayGoals = $this->match->events()->where('event_type','goal')->where('team_id',$this->match->away_team_id)->count();
            $this->match->updateScore($homeGoals, $awayGoals);
        }

        if ($this->editingEventId === $id) $this->resetForm();

        $this->match->refresh();
    }

    public function resetForm(): void
    {
        $this->editingEventId = null;
        $this->event_type = 'goal';
        $this->minute = null;
        $this->team_id = null;
        $this->player_id = null;
        $this->description = '';
    }

    public function render()
    {
        $teams = Team::whereIn('id', [$this->match->home_team_id, $this->match->away_team_id])->get();
        $players = Player::whereIn('team_id', $teams->pluck('id'))->orderBy('name')->get();

        return view('livewire.admin.matches.match-control', [
            'match' => $this->match,
            'teams' => $teams,
            'players' => $players,
        ]);
    }
}
