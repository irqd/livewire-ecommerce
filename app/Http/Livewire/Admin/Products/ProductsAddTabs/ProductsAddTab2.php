<?php

namespace App\Http\Livewire\Admin\Products\ProductsAddTabs;

use App\Models\Stocks;
use Livewire\Component;

class ProductsAddTab2 extends Component
{
    public $stocks = [];

    protected $rules = [
        // * Stocks
        'stocks.*.name' => 'required|string',
        'stocks.*.quantity' => 'required|numeric',
        'stocks.*.status' => 'required|string',
        'stocks.*.original_price' => 'required|numeric',
        'stocks.*.selling_price' => 'required|numeric',
    ];

    protected $messages = [
        'stocks.*.name.required' => 'The name field is required for all stocks.',
        'stocks.*.quantity.required' => 'The quantity field is required for all stocks.',
        'stocks.*.status.required' => 'The status field is required for all stocks.',
        'stocks.*.original_price.required' => 'The original price field is required for all stocks.',
        'stocks.*.selling_price.required' => 'The selling price field is required for all stocks.',

        'stocks.*.name.string' => 'The name field must be a string for all stocks.',
        'stocks.*.status.string' => 'The status field must be a string for all stocks.',
        'stocks.*.quantity.numeric' => 'The quantity field must be numeric for all stocks.',
        'stocks.*.original_price.numeric' => 'The original price field must be numeric for all stocks.',
        'stocks.*.selling_price.numeric' => 'The selling price field must be numeric for all stocks.',
    ];

    protected $listeners = [
        'validateStocks',
    ];

    public function validateStocks()
    {   
        $this->validate();
    }

    public function mount()
    {
        $this->stocks[] = new Stocks();
    }

    public function addStock()
    {
        $this->stocks[] = new Stocks();
        $this->emitTo('admin.products.products-add','displaySuccess','Added new stock form.');
    }

    public function removeStock($index)
    {
        if (isset($this->stocks[$index])) {
            unset($this->stocks[$index]);
        }

        $this->emitTo('admin.products.products-add','displaySuccess','Stock form deleted successfully.');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.admin.products.products-add-tabs.products-add-tab2');
    }
}
