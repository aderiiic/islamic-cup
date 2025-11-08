<?php
// app/Livewire/Auth/LoginForm.php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

#[Layout('layouts.app')]
class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'E-post är obligatorisk.',
        'email.email' => 'Ange en giltig e-postadress.',
        'password.required' => 'Lösenord är obligatoriskt.',
    ];

    public function login()
    {
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            throw ValidationException::withMessages([
                'email' => ['Felaktig e-post eller lösenord.'],
            ]);
        }

        session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
