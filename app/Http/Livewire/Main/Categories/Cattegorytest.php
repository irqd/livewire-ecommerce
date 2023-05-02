<?php

namespace App\Http\Livewire\Main\Categories;

use Livewire\Component;
use App\Models\Category;

class Cattegorytest extends Component
{
    public $category;
    public $product_list;
    public $minPrice = 0;
    public $maxPrice = 0;
    public $brands = [];



    public function updated($property)
    {
        dd($property);

    }

    public function mount($id)
    {
        $this->category = Category::find($id);
        $this->product_list = $this->category->products;
        
        dump($this->category, $this->product_list);
    }


    public function render()
    {
        return view('livewire.main.categories.cattegorytest');
    }
}
