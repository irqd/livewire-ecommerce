<div class="row g-3 pt-3">
    <div class="col-md-6">
        <label for="name" class="form-label fw-bold">Product Name</label>
        <input type="text" class="form-control @error('name') is-invalid  @enderror
        @if($name) '' @endif"
        id="name" placeholder="Product Name"
        wire:model.debounce.500ms="name">
        @error('name') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="slug" class="form-label fw-bold">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid  @enderror
        @if($slug) '' @endif"
        id="slug" placeholder="Product Name"
        wire:model.debounce.500ms="slug">
        @error('slug') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="category" class="form-label fw-bold" >
            Category
        </label>

        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" aria-placeholder="Select Category" wire:model.debounce.500ms="category">
            <option>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        @error('category') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="brand" class="form-label fw-bold" >
            Brand
        </label>

        <select name="brand" id="brand" class="form-select @error('brand') is-invalid @enderror" aria-placeholder="Select Status" wire:model.debounce.500ms="brand">
            <option>Select Brand</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        @error('brand') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea class="form-control @error('description') is-invalid  @enderror
        @if($description) '' @endif" 
        name="description" id="description" rows="2" placeholder="Description"
        wire:model.debounce.500ms="description"></textarea>

        @error('description') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="status" class="form-label fw-bold" >
            Status
        </label>

        <select name="status" id="status" class="form-select" aria-placeholder="Select Category" wire:model.debounce.500ms="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="featured" class="form-label fw-bold" >
            Featured
        </label>

        <select name="featured" id="featured" class="form-select" aria-placeholder="Select Category" wire:model.debounce.500ms="featured">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>

    <div>
        <hr>
    </div>
    
    <h4 class="my-0 pb-2">SEO Tags</h4>
    
    <div class="col-md-12 my-0">
        <label for="meta_name" class="form-label fw-bold">Meta Name</label>
        <input type="text" class="form-control @error('meta_name') is-invalid  @enderror
        @if($meta_name) '' @endif"
        id="meta_name" placeholder="Meta Name"
        wire:model.debounce.500ms="meta_name">
        @error('meta_name') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    
    <div class="col-md-12">
        <label for="meta_keyword" class="form-label fw-bold">Meta Keyword</label>
        <textarea class="form-control @error('meta_keyword') is-invalid  @enderror
        @if($meta_keyword) '' @endif" 
        name="meta_keyword" id="meta_keyword" rows="2" placeholder="Meta Keyword"
        wire:model.debounce.500ms="meta_keyword"></textarea>
        @error('meta_keyword') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    
    <div class="col-md-12">
        <label for="meta_description" class="form-label fw-bold">Meta Description</label>
        <textarea class="form-control @error('meta_description') is-invalid  @enderror
        @if($meta_description) '' @endif"
        name="meta_description" id="meta_description" rows="2" placeholder="Meta Description"
        wire:model.debounce.500ms="meta_description"></textarea>
        @error('meta_description') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
