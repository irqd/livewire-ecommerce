<?php

namespace App\Http\Livewire\Admin\Products\ProductsAddTabs;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsAddTab3 extends Component
{
    use WithFileUploads;
    public $images = [];
    
    protected $rules = [
        // * Images
        'images' => 'required|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];

    protected $listeners = [
        'validateImages',
    ];

    public function validateImages()
    {
        $this->validate();
    }

    public function removeImage($index)
    {
        if (isset($this->images[$index])) {
            unset($this->images[$index]);
        }

        $this->emitTo('admin.products.products-add','displaySuccess','Image removed successfully!');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.admin.products.products-add-tabs.products-add-tab3');
    }
}
