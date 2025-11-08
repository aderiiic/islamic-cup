<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class RegisterForm extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $phone = '';
    public $organization = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'nullable|string|max:20',
        'organization' => 'required|string|max:255',
    ];

    protected $messages = [
        'name.required' => 'Namn är obligatoriskt.',
        'email.required' => 'E-post är obligatorisk.',
        'email.email' => 'Ange en giltig e-postadress.',
        'email.unique' => 'E-postadressen är redan registrerad.',
        'password.required' => 'Lösenord är obligatoriskt.',
        'password.min' => 'Lösenordet måste vara minst 8 tecken.',
        'password.confirmed' => 'Lösenorden matchar inte.',
        'organization.required' => 'Moské/förening är obligatorisk.',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'organization' => $this->organization,
            'role' => 'team_owner',
        ]);

        auth()->login($user);

        session()->flash('success', 'Välkommen till Islamic Cup! Du kan nu skapa ditt första lag.');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
