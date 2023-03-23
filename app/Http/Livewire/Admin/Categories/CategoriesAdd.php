<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CategoriesAdd extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $description;
    public $image;
    public $status = '1';
    public $meta_name;
    public $meta_keyword;
    public $meta_description;
        
    

    protected $rules = [
        'name' => 'required|string',
        'slug' => 'required|string',
        'description' => 'nullable|string',
        'image' => 'image|nullable|mimes:jpg,jpeg,png',
        'status' => 'required|string',
        'meta_name' => 'required|string',
        'meta_keyword' => 'required|string',
        'meta_description' => 'nullable|string',
    ];
    
    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|nullable|mimes:jpg,jpeg,png',
        ]);
    }
    
    public function createCategory()
    {
        
        $this->validate();
        $category = new Category;
        $category->name = $this->name;
        $category->slug = Str::slug($this->slug);
        $category->description = $this->description;
        $category->status = $this->status;
        $category->meta_name = $this->meta_name;
        $category->meta_keyword = $this->meta_keyword;
        $category->meta_description = $this->meta_description;
        if(isset($this->image)){
            $filename = time().'.'.$this->image->getClientOriginalExtension();
         //   $this->image->storeAs('images/uploads/category/', $filename);
            $this->image->storeAs('images/uploads/category/', $filename, ['disk' => 'public']);
           // $image->Storage::move('images/uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->save();
        return redirect()->route('admin.categories', ['success' => 'Category Added']);
    }

    public function render()
    {
        return view('livewire.admin.categories.categories-add')->extends('layouts.admin');
    }
}
