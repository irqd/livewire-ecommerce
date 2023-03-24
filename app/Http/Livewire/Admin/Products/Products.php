<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brands;
use Livewire\Component;
use App\Models\Category;
use App\Models\Products as ProductModel;

class Products extends Component
{

    public $brand_products;
    public $category_products;

    public function render()
    {
        $product = ProductModel::find(1);

        dd($product->brand->name);

        return view('livewire.admin.products.products', [
            'product' => $product
        ])->extends('layouts.admin');
    }
}
