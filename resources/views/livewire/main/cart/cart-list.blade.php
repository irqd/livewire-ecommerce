@section('content')
<div class="container">


    <div class="col-8">
        <h2 class="text-2xl font-bold mb-4">Cart</h2>

        <ul class="divide-y divide-gray-200">
            @forelse($cartlist as $index => $item)
            @php
                    $product = \App\Models\Products::where(['id' => $item->products_id])->first()
            @endphp
            <li class="py-4 flex">
                <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                    <img src="{{ $product->images->first()->filename }}" alt="{{ $product->name }}"
                        class="w-full h-full object-center object-cover">
                </div>

                <div class="ml-4 flex-1 flex flex-col">
                    <div>
                        <div class="flex justify-between">
                            <h3 class="text-sm font-medium text-gray-900">{{ $product->name }}</h3>
                            <p class="ml-4 text-sm font-medium text-gray-900">{{ $product->selling_price }}</p>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
                    </div>

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
    </div>

</div>
@endsection