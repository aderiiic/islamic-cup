<?php

namespace App\Livewire\Team;

use App\Models\Team;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard')]
class EditTeam extends Component
{
    use WithFileUploads;

    public Team $team;
    public $name;
    public $organization;
    public $description;
    public $logo; // ny uppladdning
    public $color_primary;
    public $color_secondary;

    public function mount(Team $team): void
    {
        $this->authorize('update', $team);
        $this->team = $team;

        $this->team = $team;
        $this->name = $team->name;
        $this->organization = $team->organization;
        $this->description = $team->description;
        $this->color_primary = $team->color_primary ?? '#10b981';
        $this->color_secondary = $team->color_secondary ?? '#f59e0b';
    }

    public function save(): void
    {
        $this->validate([
            'name' => ['required','string','max:255', Rule::unique('teams','name')->ignore($this->team->id)],
            'organization' => ['required','string','max:255'],
            'description' => ['nullable','string','max:1000'],
            'logo' => ['nullable','image','max:2048'],
            'color_primary' => ['required','string'],
            'color_secondary' => ['required','string'],
        ]);

        if ($this->logo) {
            // till S3 senare; nu local/public
            $path = $this->logo->store('team-logos', 'public');
            $this->team->logo_path = $path;
        }

        $this->team->name = $this->name;
        $this->team->organization = $this->organization;
        $this->team->description = $this->description;
        $this->team->color_primary = $this->color_primary;
        $this->team->color_secondary = $this->color_secondary;
        $this->team->save();

        session()->flash('success', 'Lag uppdaterat.');
        $this->redirectRoute('teams.index');
    }

    public function render()
    {
        return view('livewire.team.edit-team');
    }
}
