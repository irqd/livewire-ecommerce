<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Products;
use App\Models\ProductImages;
use Illuminate\Support\Facades\File;

class ProductsDelete extends Component
{
    public $product;

    public function delete($id)
    {
        $this->middleware('admin');
        $product = Products::find($id);

        
        if ($product->images) {
            foreach ($product->images as $image) {
                if(File::exists(public_path('storage/'.$image->filename))){
                    File::delete(public_path('storage/'.$image->image));
                }
            }
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
