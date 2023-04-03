<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $usernameOrEmail;
    public $password;
    public $remember = false;
    public $showPassword = false;

    protected $rules = [
        'usernameOrEmail' => 'required|string',
        'password' => 'required|string',
    ];
    
    public function login()
    {
        $this->validate();

        $field = filter_var($this->usernameOrEmail, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field => $this->usernameOrEmail,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            if (Auth::user()->role == 'admin') { // Check if the user has an admin role
                $username = Auth::user()->username;
                return redirect('/admin/dashboard')->with('success', 'Welcome back, '.$username); // Redirect to the admin panel
            } else {
                return redirect('/');
            }        
        }

        session()->flash('danger', 'These credentials do not match our records.');
    }

    public function hide()
    {
        session()->forget('danger');
    }

    
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
