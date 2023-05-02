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
    public $product_list;
    public $minPrice = 0;
    public $maxPrice = 0;
    public $brands = [];
    public $testtest;

   // protected $listeners = ['filtersReset' => '$refresh'];


   // protected $queryString = ['minPrice', 'maxPrice', 'brands'];
   // protected $paginationTheme = 'bootstrap';

    public function updated($property)
    {
        dd($property);
        // if ($property == 'minPrice' or $property == 'maxPrice' or $property == 'brands') {
        //     $this->emitSelf('filtersReset');
        //     $this->resetPage();
            
        // }
    }

    public function mount($id)
    {
        $this->category = ModelsCategory::find($id);
        $this->product_list = $this->category->products;
    }


    public function render()
    {
       
        // $query = Products::query();
       

        
        //  $query->where('category_id', $this->category->id);
        //  $query->where('status', 1);

        // filter by minimum price
        // if ($this->minPrice) {
        //     $query->whereHas('stocks', function ($q) {
        //         $q->where('selling_price', '>=', $this->minPrice);
        //     });
        // }

        // filter by maximum price
        // if ($this->maxPrice) {
        //     $query->whereHas('stocks', function ($q) {
        //         $q->where('selling_price', '<=', $this->maxPrice);
        //     });
            
        // }

        // filter by brand
        // if ($this->brands) {
           
        //     $query->whereIn('brand_id', $this->brands);
        // }

 


        // $product_list = $query->latest()->paginate(5);



        return view('livewire.main.categories.category');
        // return view('livewire.main.categories.category', [
        //     'product_list' => $product_list
        // ]);
    }
}
