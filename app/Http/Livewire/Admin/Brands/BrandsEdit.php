<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brands;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class BrandsEdit extends Component
{
    use WithFileUploads;
    
    public $brand;

    public $name;
    public $slug;
    public $image;
    public $status;

    protected $rules = [
        'name' => 'required|string',
        'slug' => 'required|string',
        'image' => 'image|nullable|mimes:jpg,jpeg,png',
        'status' => 'required|string',
    ]; 

    public function mount($id)
    {
        $this->brand = Brands::find($id);
        $this->name = $this->brand->name;
        $this->slug = $this->brand->slug;
        $this->status= $this->brand->status;
       
    }

    public function editBrand() 
    {
        $this->validate();

        if($this->image){
            if(File::exists(public_path('storage/'.$this->brand->image))){
                File::delete(public_path('storage/'.$this->brand->image));
            }
            $filename = $this->image->store('images/uploads/brands', 'public');
            $this->brand->image = $filename;
        }
        
        $this->brand->update(
            [
                'name' => $this->name,
                'slug' => Str::slug($this->slug),
                
                'status' => $this->status
                
            ]
        );
        
        session()->flash('success', 'Brand updated successfully.');
        return redirect()->route('admin.brands');
    }
 
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.admin.brands.brands-edit')->extends('layouts.admin');;
    }
}
