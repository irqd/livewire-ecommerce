<?php

namespace App\Http\Livewire\Main\Landing;

use App\Models\Sliders;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.main.landing.index')->extends('layouts.main');
    }
}
