<div>
    <h1>
        <a href="{{ route('admin.brands') }}" class="link-dark breadcrumbs">Brands</a> /
        <a href="" class="breadcrumbs link-secondary">Add</a>
    </h1>

    <div class="card shadow-sm">
        <div class="card-header py-3 bg-dark">
            <h3 class="m-0 font-weight-bold text-light">New Brand</h3>
        </div>
        <div class="card-body bg-light">
            <form class="row g-3 justify-content" wire:submit.prevent="createBrand">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label fw-bold">Brand Name</label>
                    <input type="text" class="form-control @error('name') is-invalid  @enderror
                    @if($name) '' @endif"
                    id="name" placeholder="Brand Name"
                    wire:model.debounce.500ms="name">
                    @error('name') 
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="slug" class="form-label fw-bold">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid  @enderror
                    @if($slug) '' @endif"
                    id="slug" placeholder="Slug"
                    wire:model.debounce.500ms="slug">
                    @error('slug') 
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
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input class="form-control @error('image') is-invalid  @enderror
                    @if($image) '' @endif"
                    type="file" id="image"
                    wire:model="image" accept="image/*">     
                    @error('image') 
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    @if($image)
                        @if(!$image->isPreviewable())
                        @else
                        <img src="{{ $image->temporaryUrl()}}" alt="Brand Image" class="pt-3 img-fluid" width="300"/>
                        @endif
                    @endif 
                </div>
                
                <div class="col-md-6">
                    <label for="status" class="form-label fw-bold" >
                        Status
                    </label>
                    <select name="status" id="status" class="form-select" aria-placeholder="Select Status" wire:model.debounce.500ms="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('status') 
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="col-md-12 pt-3">
                    <button type="submit" class="btn btn-outline-success shadow-sm">
                        <i class="fa-solid fa-check"></i> Confirm
                    </button>
                    <a href="{{ route('admin.brands') }}" class="btn btn-outline-secondary shadow-sm">
                        Cancel
                    </a>
                </div>
            </form> 
        </div>
    </div>
</div>
