<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brands;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Products as ProductModel;

class Products extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    
    public function hide()
    {   
        if (session()->has('error')) {
            session()->forget('error');
        }

        if (session()->has('success')) {
            session()->forget('success');
        }
    }

    public function render()
    {
        $products = ProductModel::query();
        if($this->search) 
        {
            $products->where('name', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->orWhere('original_price', 'like', "%{$this->search}%")
            ->orWhere('selling_price', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$this->search}%")
            ->orWhere('featured', 'like', "%{($this->search == 'YES') ? '1' : '0'}%")
            ->orwhereRelation('category', 'name', 'like', "%{$this->search}%")
            ->orwhereRelation('brand', 'name', 'like', "%{$this->search}%");
        }
       
        return view('livewire.admin.products.products', [
            'products' => $products->latest()->paginate(5)
        ])->extends('layouts.admin');
    }
}
