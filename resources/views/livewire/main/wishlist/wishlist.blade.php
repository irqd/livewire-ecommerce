{{-- <div class="card">
    <div class="card-header">
        <h5 class="mb-0">Wishlist</h5>
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach ($wishlist as $item)

            @php
                    $product = \App\Models\Products::where(['id' => $item->products_id])->first()
            @endphp
            
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $product->name }}
                <button class="btn btn-outline-danger btn-sm" wire:click="removeFromWishlist({{ $product->id }})">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary btn-block" wire:click="addAllToCart()">Add all to Cart</button>
    </div>
</div> --}}

<!-- Wishlist Page Header -->
<div class="container">
<h1 class="text-center">Wishlist</h1>

<!-- Wishlist Search Bar -->
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search for items...">
        <button class="btn btn-outline-secondary" type="button">Search</button>
      </div>
    </div>
  </div>
</div>

<!-- Wishlist Items Container -->
<div class="container">
  <div class="row">
    @if ($wishlist)
    @foreach ($wishlist as $item)
    <!-- Wishlist Item Card -->
    <div class="col-md-4">
      <div class="card">
        <livewire:components.image-view image='something something'>
        <img src="item-image.jpg" class="card-img-top" alt="Item Image">
        <div class="card-body">
          <h5 class="card-title">something</h5>
          <p class="card-text">somethingsomethingsomethingsomething</p>
          <button class="btn btn-danger">Remove Item</button>
        </div>
      </div>
    </div>
    @endforeach
    @else
     <div>no items</div>
    @endif
  </div>
</div>

<!-- Clear Wishlist Button -->
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <button class="btn btn-primary btn-lg btn-block mt-5">Clear Wishlist</button>
    </div>
  </div>
</div>

</div>