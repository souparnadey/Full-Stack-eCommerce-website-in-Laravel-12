<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * @method \Livewire\Component layout(string $layout)
*/
class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone;
    public $gender;
    public $dob;
    public $showPassword = false;
    public $showConfirmPassword = false;

    public function register()
    {
        $this->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|regex:/^[0-9]{10}$/',
            'gender'   => 'required|in:male,female,other',
            'dob'      => 'required|date',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'phone'    => $this->phone,
            'gender'   => $this->gender,
            'dob'      => $this->dob,
            'password' => Hash::make($this->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        session()->flash('success', 'Registration successful!');
        return redirect()->route('register.success');
    }

    public function render()
    {
        return view('livewire.register-form')->layout('components.layouts.auth');
    }
}
