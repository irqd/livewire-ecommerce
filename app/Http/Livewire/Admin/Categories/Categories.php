<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        return view('livewire.admin.categories.categories')->extends('layouts.admin');
    }
}
