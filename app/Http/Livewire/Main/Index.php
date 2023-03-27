<?php

namespace App\Http\Livewire\Main;

use App\Models\Sliders;
use Livewire\Component;

class Index extends Component
{
    public $sliders;

    public function mount()
    {
        $this->sliders = Sliders::latest()->get();
    }

    public function render()
    {
        return view('livewire.main.index')->extends('layouts.main');
    }
}
