<div class="card">
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
</div>