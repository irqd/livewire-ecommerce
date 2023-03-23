<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;

class CategoriesAdd extends Component
{
    public function render()
    {
        return view('livewire.admin.categories.categories-add')->extends('layouts.admin');
    }
}
