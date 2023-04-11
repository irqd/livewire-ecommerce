<?php

namespace App\Http\Livewire\Main\Products;

use Livewire\Component;
use App\Models\Products;

class Product extends Component
{

    public Products $product;
    public $stocks =[];

    public function mount($id)
    {
        $this->product = Products::find($id);
        foreach ($this->product->stocks as $stock) {
            $this->stocks[] = $stock;
        }
    }

    public function render()
    {
        return view('livewire.main.products.product')->extends('layouts.main');
    }
}
