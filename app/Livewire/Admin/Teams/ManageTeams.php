<?php

namespace App\Livewire\Admin\Teams;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class ManageTeams extends Component
{
    use WithPagination;

    public $search = '';
    public $teamId = null;

    public $name = '';
    public $organization = '';
    public $description = '';
    public $color_primary = '';
    public $color_secondary = '';
    public $owner_id = null;
    public $group_number = null;
    public $status = 'approved';

    protected $rules = [
        'name' => 'required|string|max:255',
        'organization' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:1000',
        'color_primary' => 'nullable|string|max:20',
        'color_secondary' => 'nullable|string|max:20',
        'owner_id' => 'nullable|exists:users,id',
        'group_number' => 'nullable|integer|min:1|max:99',
        'status' => 'required|in:approved,pending,rejected',
    ];

    public function mount(): void
    {
        abort_unless(Gate::allows('moderate'), 403);
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function edit(int $id): void
    {
        $t = Team::findOrFail($id);
        $this->teamId = $t->id;
        $this->name = $t->name;
        $this->organization = $t->organization;
        $this->description = $t->description;
        $this->color_primary = $t->color_primary;
        $this->color_secondary = $t->color_secondary;
        $this->owner_id = $t->owner_id;
        $this->group_number = $t->group_number;
        $this->status = $t->status ?? 'approved';
        $this->resetValidation();
    }

    public function resetForm(): void
    {
        $this->reset(['teamId','name','organization','description','color_primary','color_secondary','owner_id','group_number','status']);
        $this->status = 'approved';
    }

    protected function sanitizedPayload(): array
    {
        $data = $this->validate();

        // Normalisera tomma strängar till null där fälten är nullable
        foreach (['organization','description','color_primary','color_secondary'] as $key) {
            if ($data[$key] === '') $data[$key] = null;
        }

        // owner_id och group_number kan komma som tom sträng -> null
        if ($data['owner_id'] === '' || $data['owner_id'] === 0) $data['owner_id'] = null;
        if ($data['group_number'] === '' || $data['group_number'] === 0) $data['group_number'] = null;

        return $data;
    }

    public function save(): void
    {
        abort_unless(Gate::allows('moderate'), 403);

        $data = $this->sanitizedPayload();

        if ($this->teamId) {
            Team::whereKey($this->teamId)->update($data);
            session()->flash('success', 'Lag uppdaterat.');
        } else {
            Team::create($data);
            session()->flash('success', 'Lag skapat.');
        }

        $this->resetForm();
    }

    public function delete(int $id): void
    {
        abort_unless(Gate::allows('moderate'), 403);
        Team::whereKey($id)->delete();
        session()->flash('success', 'Lag raderat.');
    }

    public function render()
    {
        $teams = Team::query()
            ->when($this->search, fn($q) =>
            $q->where(function($s){
                $s->where('name','like','%'.$this->search.'%')
                    ->orWhere('organization','like','%'.$this->search.'%');
            })
            )
            ->orderBy('group_number')
            ->orderBy('name')
            ->paginate(12);

        $owners = User::whereIn('role', ['team_owner','moderator','admin'])
            ->orderBy('name')
            ->get(['id','name','email']);

        return view('livewire.admin.teams.manage-teams', compact('teams','owners'));
    }
}
