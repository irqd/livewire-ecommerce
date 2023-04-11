<?php

namespace App\Http\Livewire\Main\Categories;

use App\Models\Category as ModelsCategory;
use App\Models\Products;
use Livewire\Component;

class Category extends Component
{

    public $category;
    public $product_list = [];

    public $min_price;
    public $max_price;

    protected $queryString = ['min_price', 'max_price'];

    public function mount($id)
    {
        $this->category = ModelsCategory::find($id);
        $this->product_list = $this->category->products()->latest()->get();
    }

    public function render()
    {
        return view('livewire.main.categories.category')->extends('layouts.category_listing');
    }
}
