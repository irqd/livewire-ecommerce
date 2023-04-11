<?php

namespace App\Http\Livewire\Main\Categories;

use Livewire\Component;
use App\Models\Products;
use Livewire\WithPagination;
use App\Models\Category as ModelsCategory;

class Category extends Component
{

    use WithPagination;
    public $category;
    

    public $min_price = 0;
    public $max_price = 0;

   protected $queryString = ['min_price', 'max_price'];
   protected $paginationTheme = 'bootstrap';
    
   public function updated($property)
    {
        if ($property == 'min_price' or $property =='max_price')
        {
            $this->resetPage();
        }
    }
  
    public function mount($id)
    {
        $this->category = ModelsCategory::find($id);
    }
    
    public function render()
    {
        $product_list = Products::where('category_id', $this->category->id)
        ->where('status', 1)
        ->has('stocks');
        
        if ($this->min_price) {
            $product_list->whereHas('stocks', function ($query) {
                $query->where('selling_price', '>=', $this->min_price);
            });
        }
        if ($this->max_price) {
            $product_list->whereHas('stocks', function ($query) {
                $query->where('selling_price', '<=', $this->max_price);
            });
        }

       
        
        return view('livewire.main.categories.category',[
            'product_list' => $product_list->latest()->get(),
        ])->extends('layouts.main');
    }
}
