<?php

namespace App\Http\Livewire\Main\Categories;

use Livewire\Component;

class Category extends Component
{
    public function render()
    {
        return view('livewire.main.categories.category')->extends('layouts.main');
    }
}
