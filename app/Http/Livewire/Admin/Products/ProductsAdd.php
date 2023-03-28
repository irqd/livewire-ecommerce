<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Brands;
use App\Models\Stocks;
use Livewire\Component;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductImages;
use Livewire\WithFileUploads;

class ProductsAdd extends Component
{
    public $tab = 'products';
    public $validationErrors = [];
    protected $listeners = [
        'displayErrors',
        'displayDanger',
        'displaySuccess',
    ];

    public function createProduct()
    {
        $this->emitTo('admin.products.products-add-tabs.products-add-tab1','validateProduct');
        $this->emitTo('admin.products.products-add-tabs.products-add-tab2','validateStocks');
        $this->emitTo('admin.products.products-add-tabs.products-add-tab3','validateImages');
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
 
    public function displayDanger($message)
    {
        session()->flash('danger', $message);
    }

    public function displaySuccess($message)
    {
        session()->flash('success', $message);
    }
    
    public function render()
    {
        return view('livewire.admin.products.products-add')->extends('layouts.admin');
    }
}

    // $product = new Products();
    // $product->name = $this->name;
    // $product->slug = $this->slug;
    // $product->description = $this->description;
    // $product->status = $this->status;
    // $product->featured = $this->featured;
    // $product->meta_name = $this->meta_name;
    // $product->meta_keyword = $this->meta_keyword;
    // $product->meta_description = $this->meta_description;
    // $product->brand_id = $this->brand;
    // $product->category_id = $this->category;
    
    // $product->save();
    // if ($this->images) {
    //     foreach ($this->images as $image) {
    //         //$filename = time() . '_' . $image->getClientOriginalName();
    //         //$path = $image->storeAs('public/products', $filename);
    //         $filename = $image->store('images/uploads/products/'.$product->id.'/', 'public');
            
    //         $productImage = new ProductImages([
    //             'filename' => $filename
    //         ]);

    //         $product->images()->save($productImage);
    //     }
    // }

    // foreach ($this->stocks as $stock) {
    //     if (!empty($stock['name'])) {
    //         $newStock = new Stocks();
    //         $newStock->name = $stock['name'];
    //         $newStock->quantity = $stock['quantity'];
    //         $newStock->original_price = $stock['original_price'];
    //         $newStock->selling_price = $stock['selling_price'];
    //         $newStock->status = $stock['status'] ?? 1;

    //         $product->stocks()->save($newStock);
    //     }
    // }