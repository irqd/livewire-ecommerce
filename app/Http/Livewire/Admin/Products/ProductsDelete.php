<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products;
use Illuminate\Support\Facades\File;

class ProductsDelete extends Component
{
    public $product;

    public function delete($id)
    {
        $product = Products::find($id);

        if(File::exists(public_path('storage/'.$product->images->filename))){
            File::delete(public_path('storage/'.$product->image));
        }
        
        $product->delete();
        
        session()->flash('success', 'Product has been deleted successfully!');

        return redirect()->route('admin.products');
    }
    
    public function render()
    {
        return view('livewire.admin.products.products-delete');
    }
}
