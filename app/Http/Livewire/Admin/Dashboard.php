<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function hide()
    {
        session()->forget('success');
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->extends('layouts.admin');
    }
}
