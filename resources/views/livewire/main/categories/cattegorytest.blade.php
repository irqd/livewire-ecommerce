<div>
    <div class="row">
        <div class="col-6">

            @if ($product_list)
            @if($product_list->count() == 0) 
                <div class="col-12">
                    <div class="alert alert-danger">
                        <span class="fw-bold">No products found...</span>
                    </div>
                </div>
            @endif

            @forelse($product_list as $product)
            <div class="col-6 col-md-4 col-lg-2 p-1" wire:key='{{ $product->id }}'>
                <a id="product" href="{{ route('main.product', ['slug' => $product->slug, 'id' => $product->id ])}}" class="text-decoration-none">
                    <div class="card bg-body shadow-sm">
                        <img src="{{ asset('storage/'.$product->images->first()->filename ) }}" class="card-img-top" alt="{{ $product->name }} image" height="160px">
                        
                        <div class="card-body p-2 m-0">
                            <div class="card-text p-0 m-0 mb-1">
                                <span class=" p-1 top-0 start-100  badge 
                                rounded-pill bg-danger">{{ $product->brand->name }} </span>
                            <h6 class="fw-bold link-dark pt-1">
                                {{  $product->name }} 
                           
                            </h6>
                            </div>
                            @if ($product->stocks->first())
                            <h6 class="text-warning m-0 p-0">
                            {{-- <span class="text-dark fs-5">P {{ $product->stocks[0]->selling_price }} --}}
                            <span class="text-dark fs-5">P {{ $product->stocks->first()->selling_price }}
                            </span>
                            </h6>
                            @endif

                            @if ($product->stocks->first())
                            <div class="d-flex justify-content-between">
                            <small class="text-danger">
                            <span class="text-dark">P</span>
                            <s>{{ $product->stocks->first()->original_price }}</s>
                            </small>
                            </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            {{-- {{ $product_list->links()}} --}}
            @endif

        </div>
        <div class="col-4">
            @foreach($category->brands as $brand)
                        <div class="form-check pb-1" wire:key='{{ $brand->id }}'>
                            <input class="form-check-input"  type="checkbox" value="{{ $brand->id }}" id="brand_in_category_{{ $brand->id }}" 
                            wire:model="brands.{{ $brand->id }}">
                            <label class="form-check-label fw-bold" for="brand_in_category_{{ $brand->id }}">
                            {{ $brand->name }}
                            </label>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between">
                        <div class="">
                            <label for="minPrice" class="form-label fw-bold mb-0">Min</label>
                            <input type="number" id="minPrice" wire:model="minPrice" class="form-control">
                        </div>
                        <div class="px-2 pt-4">
                            <span>
                            <i class="fa-solid fa-minus"></i>
                            </span>
                        </div>
                        <div class="">
                            <label for="maxPrice" class="form-label fw-bold mb-0">Max</label>
                            <input type="number" id="maxPrice" wire:model="maxPrice" class="form-control">
                        </div>
                    </div>
        </div>

    </div>
</div>
