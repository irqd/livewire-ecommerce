<?php

namespace App\Http\Livewire\Main\Cart;

use Livewire\Component;
use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class CartList extends Component
{

    public $cartlist;
    public $subtotal;
    public $tax;
    public $total;

    protected $listeners = [
        'addToCart',
    ];

    public function mount()
    {
        $this->cartlist = Auth::User()->cartList;

    }

    public function removeFromCart($itemId)
    {
        auth()->user()->cartlist()->where('id', $itemId)->delete();

        $this->cart = $this->cart->filter(function ($item) use ($itemId) {
            return $item->id != $itemId;
        });

        $this->emit('cartUpdated');
    }

    public function clearCart()
    {
        auth()->user()->cartlist()->delete();

        $this->cartlist = collect([]);

        $this->emit('cartUpdated');
    }



    public function render()
    {
        return view('livewire.main.cart.cart-list');
    }
}
