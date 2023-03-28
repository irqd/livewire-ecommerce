<?php

namespace App\Http\Livewire\Admin\Products\ProductsAddTabs;

use App\Models\Brands;
use Livewire\Component;
use App\Models\Category;

class ProductsAddTab1 extends Component
{
    // Selections
    public $categories;
    public $brands;

    // Product Info
    public $name;
    public $slug;
    public $description;
    public $category;
    public $brand;
    public $status = '1';
    public $featured = '0';
    public $meta_name;
    public $meta_keyword;
    public $meta_description;

    protected $rules = [
        // * Product
        'name' => 'required|string',
        'slug' => 'required|string',
        'description' => 'nullable|string',
        'category' => 'required|string',
        'brand' => 'required|string',
        'status' => 'required|string',
        'featured' => 'required|string',
        'meta_name' => 'required|string',
        'meta_keyword' => 'required|string',
        'meta_description' => 'nullable|string',
    ];

    protected $listeners = [
        'validateProduct',
    ];

    public function validateProduct()
    {   
        $this->validate();
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->brands = Brands::all();
    }

    public function updated($property)
    {
        $this->validateOnly($property);        
    }

    public function render()
    {
        return view('livewire.admin.products.products-add-tabs.products-add-tab1');
    }
}    
