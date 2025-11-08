<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class ManageUsers extends Component
{
    use WithPagination;

    public $search = '';
    public $name = '';
    public $email = '';
    public $phone = '';
    public $organization = '';
    public $role = 'team_owner';
    public $password = '';
    public $userId = null;
    public $can_create_multiple_teams = false;
    public $confirmingDeleteId = null;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'phone' => 'nullable|string|max:30',
        'organization' => 'nullable|string|max:255',
        'role' => 'required|in:admin,moderator,team_owner',
        'password' => 'nullable|min:8',
        'can_create_multiple_teams' => 'boolean',
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function mount(): void
    {
        abort_unless(Gate::allows('manage-users'), 403);
    }

    public function edit(int $id): void
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->organization = $user->organization;
        $this->role = $user->role;
        $this->can_create_multiple_teams = (bool) $user->can_create_multiple_teams;
        $this->password = '';
        $this->resetValidation();
    }

    public function save(): void
    {
        abort_unless(Gate::allows('manage-users'), 403);

        if ($this->userId) {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $this->userId,
                'phone' => 'nullable|string|max:30',
                'organization' => 'nullable|string|max:255',
                'role' => 'required|in:admin,moderator,team_owner',
                'password' => 'nullable|min:8',
                'can_create_multiple_teams' => 'boolean',
            ]);

            $user = User::findOrFail($this->userId);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->organization = $this->organization;
            $user->role = $this->role;
            $user->can_create_multiple_teams = $this->can_create_multiple_teams;
            if ($this->password) {
                $user->password = Hash::make($this->password);
            }
            $user->save();

            session()->flash('success', 'Användare uppdaterad.');
        } else {
            $this->validate();

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'organization' => $this->organization,
                'role' => $this->role,
                'password' => $this->password ? Hash::make($this->password) : Hash::make(str()->random(16)),
                'can_create_multiple_teams' => $this->can_create_multiple_teams,
            ]);

            if ($user->isTeamOwner()) {
                $token = Password::createToken($user);
                $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $user->email], false));
                $user->notify(new \App\Notifications\WelcomeTeamOwnerNotification($resetUrl));
            }

            session()->flash('success', 'Användare skapad.');
        }

        $this->reset(['userId','name','email','phone','organization','role','password','can_create_multiple_teams']);
    }

    public function confirmDelete(int $id): void
    {
        $this->confirmingDeleteId = $id;
    }

    public function deleteConfirmed(): void
    {
        abort_unless(Gate::allows('manage-users'), 403);
        if ($this->confirmingDeleteId) {
            User::whereKey($this->confirmingDeleteId)->delete();
            $this->confirmingDeleteId = null;
            session()->flash('success', 'Användare raderad.');
        }
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($q) {
                $q->where(function($q2){
                    $q2->where('name','like','%'.$this->search.'%')
                        ->orWhere('email','like','%'.$this->search.'%')
                        ->orWhere('organization','like','%'.$this->search.'%');
                });
            })
            ->orderBy('role')
            ->orderBy('name')
            ->paginate(12);

        return view('livewire.admin.users.manage-users', compact('users'));
    }
}
