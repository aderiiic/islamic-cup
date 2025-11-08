<?php
// app/Livewire/Team/CreateTeam.php

namespace App\Livewire\Team;

use App\Models\Team;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard')]

class CreateTeam extends Component
{
    use WithFileUploads;

    public $name = '';
    public $organization = '';
    public $description = '';
    public $logo;
    public $color_primary = '#10b981';
    public $color_secondary = '#f59e0b';

    protected $rules = [
        'name' => 'required|string|max:255|unique:teams',
        'organization' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'logo' => 'nullable|image|max:2048', // 2MB Max
        'color_primary' => 'required|string',
        'color_secondary' => 'required|string',
    ];

    protected $messages = [
        'name.required' => 'Lagnamn är obligatoriskt.',
        'name.unique' => 'Lagnamnet finns redan.',
        'organization.required' => 'Moské/förening är obligatorisk.',
        'logo.image' => 'Logotypen måste vara en bild.',
        'logo.max' => 'Logotypen får vara max 2MB.',
    ];

    public function mount()
    {
        // Pre-fill organization from user
        $this->authorize('create', \App\Models\Team::class);
    }

    public function createTeam()
    {
        // Check if user can create teams
        if (!auth()->user()->canCreateTeams()) {
            session()->flash('error', 'Du kan inte skapa fler lag. Kontakta administratör för tillstånd.');
            return;
        }

        $this->validate();

        $logoPath = null;
        if ($this->logo) {
            $logoPath = $this->logo->store('team-logos', 'public');
        }

        $team = Team::create([
            'name' => $this->name,
            'organization' => $this->organization,
            'description' => $this->description,
            'logo_path' => $logoPath,
            'color_primary' => $this->color_primary,
            'color_secondary' => $this->color_secondary,
            'owner_id' => auth()->id(),
            'status' => 'pending',
        ]);

        session()->flash('success', 'Laget har skapats och väntar på godkännande från administratör.');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.team.create-team');
    }
}
