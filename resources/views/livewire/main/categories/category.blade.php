<section class="content" class="d-flex">
    <div class="sidebar bg-light border shadow-sm" id="side_nav">
       <div class="px-2 pt-5">
          <div class="card bg-body border-0">
             <div class="card-body">
                <div class="card-title">
                   <h6 class="fw-bold">Brands</h6>
                </div>

             </div>
          </div>
       </div>

       <hr class="h-color mx-2">

       <div class="px-2">
          <div class="card bg-body border-0">
             <div class="card-body">
                <div class="card-title">
                   <h6 class="fw-bold">Sort by price</h6>
                </div>
                
                <div class="d-flex justify-content-between">
                   <div class="">
                      <input type="number" wire:model="min_price" class="form-control">
                      {{-- <label for="name" class="form-label fw-bold">Brand </label>
                      <input type="text" class="form-control @error('name') is-invalid  @enderror
                      @if($name) '' @endif"
                      id="name" placeholder="Brand Name"
                      wire:model.debounce.500ms="name">
                      @error('name') 
                      <small class="text-danger">{{ $message }}</small>
                      @enderror --}}
                   </div>

                   <div class="px-2 pt-1">
                      <span>
                         <i class="fa-solid fa-minus"></i>
                      </span>
                   </div>

                   <div class="">
                      <input type="number"  wire:model="max_price" class="form-control">
                   </div>
                </div>

             </div>
          </div>
       </div>
    </div>

    <div class="d-md-none d-block" id="opn-cls-btn">
       <button class="btn px-1 py-0 open-btn">
          <i class="fa-solid fa-bars-staggered"></i>
       </button>
    </div> 

    <div class="px-4 py-5">
        <div>
            <h1>
                <a href="{{ route('main.categories') }}" class="link-dark breadcrumbs">Categories</a> /
                <a href="" class="breadcrumbs link-secondary">{{ $category->name }}</a>
            </h1>
        
            <div class="row px-3 pt-3">
               
                @if(empty($product_list))
                    <div class="col">
                        <div class="alert alert-danger">
                            No products found...
                        </div>
                    </div>
                @endif
               
                @foreach($product_list as $product)
               
                    <div class="col-6 col-md-4 col-lg-2 p-1">
                        <a id="product" href="{{ route('main.product', ['slug' => $product->slug, 'id' => $product->id ])}}" class="text-decoration-none">
                            <div class="card bg-body shadow-sm">
                                <img src="{{ asset('storage/'.$product->images->first()->filename ) }}" class="card-img-top" alt="{{ $product->name }} image" height="160px">
                                <div class="card-body p-2 m-0">
                                    <div class="card-text p-0 m-0 mb-1">
                                        <h6 class="fw-bold link-dark pt-1">
                                            {{  $product->name }}
                                        </h6>
                                    </div>
                                    
                                    <h6 class="text-warning m-0 p-0">
                                     
                                        {{-- <span class="text-dark fs-5">P {{ $product->stocks[0]->selling_price }} --}}
                                        
                                        <span class="text-dark fs-5">P {{ $product->stocks->first()->selling_price }}
                                
                                        </span>
                                    </h6>
                                    
                                    <div class="d-flex justify-content-between">
                                        <small class="text-danger">
                                            <span class="text-dark">P</span>
                                            <s>{{ $product->stocks->first()->original_price }}</s>
                                        </small>
                                    </div>  
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 </section>



