<?php

namespace App\Http\Livewire\Main\Cart;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartList extends Component
{

    public $cartlist;

    public function mount()
    {
        $this->cartlist = Auth::User()->cartList;
    }

    public function render()
    {
        return view('livewire.main.cart.cart-list');
    }
}
