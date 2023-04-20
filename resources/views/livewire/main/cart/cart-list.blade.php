@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach($cartlist as $item)
                {{ dd($item, $item->products) }}
                    <div class="col-md-6" wire:key='{{ $item->id }}'>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->products->name }}</h5>
                                <p class="card-text">{{ $item->products->description }}</p>
                                <button class="btn btn-primary" wire:click="addToCart({{ $item->id }})">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <livewire:main.wishlist.wishlist wire:key="{{ Auth::User()->id }}" />
        </div>
    </div>

</div>
@endsection