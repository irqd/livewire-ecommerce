<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
       // $categories = Category::paginate(10);
        $categories = Category::all();

      
        return view('livewire.admin.categories.categories', ['categories' => $categories])->extends('layouts.admin');
    }

}
