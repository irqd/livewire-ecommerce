@section('content')
<div class="container">


    {{-- <div class="col-8">
        <h2 class="text-2xl font-bold mb-4">Cart</h2>

        <ul class="divide-y divide-gray-200">
            @forelse($cart_list as $index => $item)
        
            <li class="py-4 flex">
                <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                    <img src="" alt="{{ $item->product->name }}"
                        class="w-full h-full object-center object-cover">
                </div>

                <div class="ml-4 flex-1 flex flex-col">
                    <div>
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">{{ $item->product->name }}</h3>
                            <p class="ml-4 text-sm font-medium text-gray-900">{{ $item->product->selling_price }}</p>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">{{ $item->product->description }}</p>
                    </div>

                    <p class="h1">{{ $item->pivot->quantity }}</p>

                    <div class="flex-1 flex items-end justify-between text-sm">
                        <button wire:click="removeItem({{ $index }})"
                            class="font-medium text-red-600 hover:text-red-500">Remove</button>
                    </div>
                </div>
            </li>
            @empty
            <p>No items in cart</p>
            @endforelse
        </ul>

        <div class="mt-6">
            <button wire:click="clearCart"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Clear cart
            </button>
        </div>
    </div>

    <div class="container col-4">

        <livewire:main.wishlist.wishlist wire:key="{{ Auth::User()->id }}" />
    </div> --}}

    <section class="h-100 gradient-custom">
        <div class="container py-5">
          <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0">Cart - 
                    
                    @if(optional(Auth::user()->shoppingCart)->stocks)
                    {{ Auth::user()->shoppingCart->first()->stocks->count() }}
                    @else
                    0
                    @endif items</h5>
                </div>
                <div class="card-body">
                  <!-- Single item -->
                  @if ($cart_list)
                  @forelse($cart_list as $index => $item)
                  <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                      <!-- Image -->
                      <div class="bg-image hover-overlay rounded overflow-hidden position-relative">
                        <livewire:components.image-view wire:key='{{ $item->id, $item->product->id }}' className='w-100 hover-zoom' alt="Blue Jeans Jacket" image="{{ optional($item->product->images->first())->filename }}">
                        <a href="#!">
                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                        </a>
                      </div>
                      <!-- Image -->
                    </div>
      
                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                      <!-- Data -->
                      <p><strong>{{ $item->product->name }}</strong></p>
                      <p>Variant: {{ $item->name }}</p>
                      <p class="text-truncate">{{ $item->product->description }}</p>
                      <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-bs-toggle="tooltip"
                        title="Remove item">
                        <i class="fas fa-trash"></i>
                      </button>
                      <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="tooltip"
                        title="Save to the wish list">
                        <i class="fas fa-heart"></i>
                      </button>
                      <!-- Data -->
                    </div>
      
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                      <!-- Quantity -->
                      <div class="d-flex mb-4" style="max-width: 300px">
                        <button class="btn btn-primary px-3 m-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>
      
                        <div class="form-floating form-outline">
                          <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
                          <label class="form-label" for="form1">Quantity</label>
                        </div>
      
                        <button class="btn btn-primary px-3 m-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <!-- Quantity -->
      
                      <!-- Price -->
                      <p class="text-start text-md-center">
                        
                            <span class="text-dark fs-3">
                               <i class="fa-solid fa-peso-sign"></i>
                               {{ $item->selling_price }}
                            </span> 
                        
             
                         <small class="text-danger mx-2 pb-1 fw-bold">
                            <span class="text-dark"><i class="fa-solid fa-peso-sign"></i></span>
                            <s>{{ $item->original_price }}</s>
                         </small>
                        
                      </p>
                      <!-- Price -->
                    </div>
                  </div>
                  <hr class="my-4" />
                  @empty
                  <p>No items in cart</p>
                  @endforelse
                  @endif
                  <!-- Single item -->
      
                 
      
                  
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4">
                <div class="card-header py-3">
                  <h5 class="mb-0">Summary</h5>
                </div>
                <div class="card-body">
                  <ul class="list-group list-group-flush">
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                      Total Selling Price
                      <span>{{ number_format(optional($cart_list)->sum('selling_price'), 2) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                      Total Original Price
                      <span>{{ number_format(optional($cart_list)->sum('original_price'), 2) }}</span>
                    </li>
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                      <div>
                        <strong>Total amount</strong>
                        <strong>
                          <p class="mb-0">(including VAT)</p>
                        </strong>
                      </div>
                      <span><strong>{{ number_format('9999999999', 2) }}</strong></span>
                    </li>
                  </ul>
      
                  <button type="button" class="btn btn-primary btn-lg btn-block">
                    Go to checkout
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>


        {{-- <div class="container">

          <livewire:main.wishlist.wishlist wire:key="{{ Auth::User()->id }}" />
         </div> --}}
      </section>

      
    </div>
@endsection