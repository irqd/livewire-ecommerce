<div class="row g-3 d-flex justify-content-center pt-3">
    <div class="col-md-6">
        <label for="images" class="form-label fw-bold">Product Images</label>
        <input class="form-control @error('images') is-invalid  @enderror
        @if($images) '' @endif"
        type="file" id="images"
        wire:model="images" accept="image/*" multiple> 

        @error('images') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    @if(!$images)
        <div class="col-md-12">
            <div class="alert alert-danger">
                No image available
            </div>
        </div>
    @endif

    @if($images)
        <div class="row d-flex justify-content-center">
            @foreach($images as $index => $image)
                <div class="col-md-3 fixed-size text-center">
                    <img src="{{ $image->temporaryUrl()}}" class="pt-3 pb-1 img-fluid w-100 h-75"/>
                    <span>
                        <button class="btn btn-danger btn-sm shadow-sm" wire:click.prevent="removeImage({{ $index }})">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </span>
                </div>
            @endforeach
        </div>
    @endif
</div>
