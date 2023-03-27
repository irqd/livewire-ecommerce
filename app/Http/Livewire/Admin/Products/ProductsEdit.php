<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Products;
use Livewire\Component;

class ProductsEdit extends Component
{

    public $product;
    
    public $name;
    public $description;
    public $original_price;
    public $selling_price;
    public $status;
    public $featured;
    public $meta_name;
    public $meta_keyword;
    public $meta_description;
    public $brand_id;
    public $category_id;

    public function mount($id)
    {
        $this->product = Products::find($id);

        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->original_price = $this->product->original_price;
        $this->selling_price = $this->product->selling_price;
        $this->status = $this->product->status;
        $this->featured = $this->product->featured;
        $this->meta_name = $this->product->meta_name;
        $this->meta_keyword = $this->product->meta_keyword;
        $this->meta_description = $this->product->meta_description;
        $this->brand_id = $this->product->brand->id;
        $this->category_id = $this->product->category->id;
        
       
    }

    public function render()
    {
        return view('livewire.admin.products.products-edit')->extends('layouts.admin');
    }
}
