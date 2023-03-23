<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class Account extends Component
{
    public function render()
    {
        return view('livewire.profile.account')->extends('layouts.profile');
    }
}
