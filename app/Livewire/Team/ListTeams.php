<?php

namespace App\Livewire\Team;

use App\Models\Team;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard')]
class ListTeams extends Component
{
    public $teams = [];

    public function mount(): void
    {
        $this->authorizeView();
        $this->loadTeams();
    }

    protected function authorizeView(): void
    {
        abort_unless(auth()->check(), 403);
    }

    public function loadTeams(): void
    {
        $this->teams = Team::query()
            ->where('owner_id', auth()->id())
            ->orderByDesc('created_at')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.team.list-teams');
    }
}
