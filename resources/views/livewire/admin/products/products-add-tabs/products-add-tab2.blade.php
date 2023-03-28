<div>
    <div class="d-flex justify-content-start pt-3 gap-2">
        <button type="button" class="btn btn-outline-success shadow-sm" wire:click.prevent="addStock">
            <i class="fa-solid fa-plus"></i> New
        </button>
    </div>
    
    <div class="pt-3">
        @if(!$stocks)
            <div class="alert alert-danger">
                No stock available
            </div>
        @else
        @foreach(array_reverse($stocks, true) as $index => $stock)
            <div class="py-2">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fs-5 fw-bold bg-dark px-3 text-light rounded-5 shadow-sm">{{ $index + 1 }}</p>
                            </div>
    
                            <div>
                                <button type="button" class="btn btn-outline-danger shadow-sm" wire:click.prevent="removeStock({{$index}})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>    
                        </div>
                    </div>
    
                    <div class="card-body bg-light">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="stock_name{{ $index }}" class="form-label fw-bold">Stock Name</label>
                                <input type="text" class="form-control @error('stocks.'.$index.'.name') is-invalid @enderror"
                                    id="stock_name{{ $index }}" placeholder="Stock Name"
                                    wire:model.debounce.500ms="stocks.{{ $index }}.name">
                                @error('stocks.'.$index.'.name') 
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="col-md-4">
                                <label for="quantity{{ $index }}" class="form-label fw-bold">Quantity</label>
                                <input type="number" class="form-control @error('stocks.'.$index.'.quantity') is-invalid @enderror"
                                    id="quantity{{ $index }}" placeholder="Quantity"
                                    wire:model.debounce.500ms="stocks.{{ $index }}.quantity">
                                @error('stocks.'.$index.'.quantity') 
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="col-md-4">
                                <label for="status{{ $index }}" class="form-label fw-bold">Status</label>
                                <select name="status{{ $index }}" id="status{{ $index }}" class="form-select"
                                    aria-placeholder="Select Status"
                                    wire:model.debounce.500ms="stocks.{{ $index }}.status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
    
                            <div class="col-md-6">
                                <label for="original_price{{ $index }}" class="form-label fw-bold">Original Price</label>
                                <input type="number" class="form-control @error('stocks.'.$index.'.original_price') is-invalid @enderror"
                                    id="original_price{{ $index }}" placeholder="Original Price"
                                    wire:model.debounce.500ms="stocks.{{ $index }}.original_price">
                                @error('stocks.'.$index.'.original_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
        
                            <div class="col-md-6">
                                <label for="selling_price{{ $index }}" class="form-label fw-bold">Selling Price</label>
                                <input type="number" class="form-control @error('stocks.'.$index.'.selling_price') is-invalid @enderror"
                                    id="selling_price{{ $index }}" placeholder="Selling Price"
                                    wire:model.debounce.500ms="stocks.{{ $index }}.selling_price">
                                @error('stocks.'.$index.'.selling_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>                  
        @endforeach
        @endif
    </div>
</div>
