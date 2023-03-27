<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brands;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class ProductsAdd extends Component
{
    use WithFileUploads;
    public $tab = 'products';
    public $stock = 0;

    // Selections
    public $categories;
    public $brands;

    // Product Info
    public $category;
    public $brand;
    public $name;
    public $slug;
    public $description;
    public $status = '1';
    public $featured = '0';
    public $meta_name;
    public $meta_keyword;
    public $meta_description;

    
    public function addStock()
    {
        $this->stock++;
    }

    public function removeStock()
    {
        if ($this->stock === 0){
            session()->flash('danger', 'Stock cannot be less than 0');
            return;
        }

        $this->stock--;
    }

    public function hide()
    {   
        if (session()->has('error')) {
            session()->forget('error');
        }

        if (session()->has('success')) {
            session()->forget('success');
        }
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->brands = Brands::all();
    }

    public function render()
    {
        return view('livewire.admin.products.products-add')->extends('layouts.admin');
    }
}


// public $stocks;
    
// public function addStock()
// {
//     $this->stocks[] = new Stocks();
// }

// public function saveStocks()
// {
//     $data = [];
//     foreach ($this->stocks as $stock) {
//         $data[] = $stock->toArray();
//     }
//     Stocks::insert($data);
// }