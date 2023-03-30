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
            $feature = strtoupper($this->search) == 'YES' ? 1 : 0;
            $status = strtoupper($this->search) == 'ACTIVE' ? 1 : 0;

            $products->where('name', 'like', "%{$this->search}%")
            ->orWhere('slug', 'like', "%{$this->search}%")
            ->orWhere('description', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$status}%")
            ->orWhere('featured', 'like', "%{$feature}%")
            ->orwhereRelation('category', 'name', 'like', "%{$this->search}%")
            ->orwhereRelation('brand', 'name', 'like', "%{$this->search}%");
        }
       
        return view('livewire.admin.products.products', [
            'products' => $products->latest()->paginate(5)
        ])->extends('layouts.admin');
    }
}
