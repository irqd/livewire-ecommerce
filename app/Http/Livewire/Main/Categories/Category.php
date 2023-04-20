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
    public $brands = [];

    protected $listeners = ['filtersReset' => '$refresh'];


    protected $queryString = ['min_price', 'max_price', 'brands'];
    protected $paginationTheme = 'bootstrap';

    public function updated($property)
    {
        if ($property == 'min_price' or $property == 'max_price' or $property == 'brands') {
            $this->emitSelf('filtersReset');
            $this->resetPage();
        }
    }

    public function mount($id)
    {
        $this->category = ModelsCategory::find($id);
    }

    public function render()
    {
        $product_list = Products::with('stocks')
            ->where('category_id', $this->category->id)
            ->when($this->brands, function ($query, $brands) {
                $query->whereIn('brand_id', $brands);
            })
            ->when($this->min_price, function ($query, $min_price) {
                $query->whereHas('stocks', function ($query) use ($min_price) {
                    $query->where('selling_price', '>=', $min_price);
                });
            })
            ->when($this->max_price, function ($query, $max_price) {
                $query->whereHas('stocks', function ($query) use ($max_price) {
                    $query->where('selling_price', '<=', $max_price);
                });
            })->where('status', 1)->has('stocks');

        return view('livewire.main.categories.category', [
            'product_list' => $product_list->latest()->get()
        ]);
    }
}
