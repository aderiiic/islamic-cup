<?php

namespace App\Livewire\Admin\Tournament;

use App\Models\FootballMatch;
use App\Models\Team;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard')]
class GroupAndSchedule extends Component
{
    public $group_number = 1;
    public $match_type = 'group';
    public $scheduled_at = '';
    public $venue = '';
    public $duration_minutes = 40;
    public $home_team_id = null;
    public $away_team_id = null;

    public $filter_group = null;

    // Generator
    public $scheduled_date = '';
    public $default_time = '10:00';
    public $duration = 40;

    public function mount(): void
    {
        abort_unless(Gate::allows('moderate'), 403);
    }

    public function autoAssignGroups(): void
    {
        $teams = Team::orderBy('group_number')->orderBy('name')->get();
        $g = 1;
        foreach ($teams as $t) {
            $t->group_number = $g;
            $t->save();
            $g++;
            if ($g > 4) $g = 1;
        }
        session()->flash('success', 'Lag tilldelade grupper 1–4.');
    }

    public function generateGroupSchedule(): void
    {
        $this->validate([
            'scheduled_date' => 'required|date',
            'default_time' => 'required',
            'venue' => 'nullable|string|max:255',
            'duration' => 'required|integer|min:20|max:120',
        ]);

        $groups = Team::whereNotNull('group_number')->whereBetween('group_number', [1,4])->get()->groupBy('group_number');

        foreach ($groups as $groupNo => $teams) {
            $teamIds = $teams->pluck('id')->values();
            $n = $teamIds->count();
            if ($n < 2) continue;

            $kickoff = now()->parse($this->scheduled_date . ' ' . $this->default_time);
            for ($i = 0; $i < $n; $i++) {
                for ($j = $i + 1; $j < $n; $j++) {
                    FootballMatch::create([
                        'home_team_id' => $teamIds[$i],
                        'away_team_id' => $teamIds[$j],
                        'group_number' => $groupNo,
                        'match_type' => 'group',
                        'scheduled_at' => $kickoff->copy(),
                        'venue' => $this->venue ?: 'Plan A',
                        'duration_minutes' => $this->duration,
                        'status' => 'scheduled',
                        'home_score' => 0,
                        'away_score' => 0,
                        'home_score_ht' => 0,
                        'away_score_ht' => 0,
                    ]);
                    $kickoff = $kickoff->addMinutes($this->duration + 10);
                }
            }
        }

        session()->flash('success', 'Gruppmatcher genererade.');
    }

    public function createMatch(): void
    {
        abort_unless(Gate::allows('moderate'), 403);

        $this->validate([
            'home_team_id' => 'required|integer|different:away_team_id|exists:teams,id',
            'away_team_id' => 'required|integer|exists:teams,id',
            'group_number' => 'required|integer|min:1|max:99',
            'match_type' => 'required|in:group,quarter_final,semi_final,final,third_place',
            'scheduled_at' => 'required|date',
            'venue' => 'nullable|string|max:255',
            'duration_minutes' => 'required|integer|min:10|max:120',
        ]);

        FootballMatch::create([
            'home_team_id' => (int) $this->home_team_id,
            'away_team_id' => (int) $this->away_team_id,
            'group_number' => (int) $this->group_number,
            'match_type' => $this->match_type,
            'scheduled_at' => $this->scheduled_at,
            'venue' => $this->venue ?: 'Plan A',
            'duration_minutes' => $this->duration_minutes ?: 40,
            'status' => 'scheduled',
            'home_score' => 0,
            'away_score' => 0,
            'home_score_ht' => 0,
            'away_score_ht' => 0,
        ]);

        $this->reset(['home_team_id','away_team_id','venue','duration_minutes','scheduled_at']);

        session()->flash('success', 'Match skapad och schemalagd.');
    }

    public function render()
    {
        $teams = Team::orderBy('group_number')->orderBy('name')->get();
        $grouped = $teams->groupBy(fn($t) => (int)($t->group_number ?? 0));

        $matches = FootballMatch::with(['homeTeam','awayTeam'])
            ->when($this->filter_group, fn($q) => $q->where('group_number', $this->filter_group))
            ->orderBy('scheduled_at')
            ->get();

        return view('livewire.admin.tournament.group-and-schedule', [
            'teams' => $teams,
            'matches' => $matches,
            'grouped' => $grouped,
        ]);
    }
}
