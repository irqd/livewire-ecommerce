<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brands;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class BrandsAdd extends Component
{

    use WithFileUploads;

    public $name;
    public $slug;
    public $description;
    public $image;
    public $status = '1';

    protected $rules = [
        'name' => 'required|string',
        'slug' => 'required|string',
        'description' => 'nullable|string',
        'image' => 'image|nullable|mimes:jpg,jpeg,png',
        'status' => 'required|string',
    ];

    public function createBrand()
    {
        $this->validate();
        $brand = new Brands;
        
        $brand->name = $this->name;
        $brand->slug = Str::slug($this->slug);
        $brand->description = $this->description;
        $brand->status = $this->status;

        if($this->image){
            $filename = $this->image->store('images/uploads/brands', 'public');
            $brand->image = $filename;
        }

        $brand->save();
        session()->flash('success', 'Brand has been created successfully!');
        return redirect()->route('admin.brands');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }


    public function render()
    {
        return view('livewire.admin.brands.brands-add')->extends('layouts.admin');
    }
}
