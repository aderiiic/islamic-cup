<?php

namespace App\Livewire\Team\Players;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard')]
class ManagePlayers extends Component
{
    public Team $team;

    public $name = '';
    public $email = '';
    public $phone = '';
    public $position = '';
    public $jersey_number = '';
    public $birth_date = '';
    public $is_captain = false;
    public $playerId = null;
    public $confirmingDeleteId = null;

    public function mount(Team $team): void
    {
        abort_unless(auth()->user()->isAdmin() || auth()->user()->isModerator() || $team->owner_id === auth()->id(), 403);
        $this->team = $team;
    }

    public function edit(int $id): void
    {
        $p = Player::where('team_id', $this->team->id)->findOrFail($id);
        $this->playerId = $p->id;
        $this->name = $p->name;
        $this->email = $p->email;
        $this->phone = $p->phone;
        $this->position = $p->position;
        $this->jersey_number = $p->jersey_number;
        $this->birth_date = optional($p->birth_date)->format('Y-m-d');
        $this->is_captain = (bool) $p->is_captain;
    }

    public function save(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'position' => 'nullable|string|max:50',
            'jersey_number' => 'nullable|integer|min:1|max:99',
            'birth_date' => 'nullable|date',
            'is_captain' => 'boolean',
        ]);

        if ($this->playerId) {
            $p = Player::where('team_id', $this->team->id)->findOrFail($this->playerId);
            $p->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'position' => $this->position,
                'jersey_number' => $this->jersey_number,
                'birth_date' => $this->birth_date,
                'is_captain' => $this->is_captain,
            ]);
            session()->flash('success', 'Spelare uppdaterad.');
        } else {
            Player::create([
                'team_id' => $this->team->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'position' => $this->position,
                'jersey_number' => $this->jersey_number,
                'birth_date' => $this->birth_date,
                'is_captain' => $this->is_captain,
            ]);
            session()->flash('success', 'Spelare skapad.');
        }

        $this->reset(['playerId','name','email','phone','position','jersey_number','birth_date','is_captain']);
    }

    public function confirmDelete(int $id): void
    {
        $this->confirmingDeleteId = $id;
        $this->dispatch('confirm-delete');
    }

    public function deleteConfirmed(): void
    {
        if ($this->confirmingDeleteId) {
            Player::where('team_id', $this->team->id)->whereKey($this->confirmingDeleteId)->delete();
            $this->confirmingDeleteId = null;
            session()->flash('success', 'Spelare raderad.');
        }
    }

    public function render()
    {
        $players = $this->team->players()->orderBy('jersey_number')->orderBy('name')->get();

        return view('livewire.team.players.manage-players', [
            'team' => $this->team,
            'players' => $players,
        ]);
    }
}
