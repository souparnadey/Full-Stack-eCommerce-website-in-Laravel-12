<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * @method \Livewire\Component layout(string $layout)
*/
class LoginForm extends Component
{
    public $email;
    public $password;
    public $showPassword = false;

    public function login()
    {
        $this->validate([
            'email'    => 'required|email',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();

            // Role-based redirect
            if ($user->role === 'admin') {
                session()->flash('success', 'Welcome back, Admin 👑');
                return redirect()->route('admin.dashboard');
            }

            session()->flash('success', 'Login successful! 🎉');
            return redirect()->route('dashboard');
        }

        // If login fails
        session()->flash('error', 'Invalid email or password.');
    }

    public function render()
    {
        return view('livewire.login-form')
            ->layout('components.layouts.auth');
    }
}
