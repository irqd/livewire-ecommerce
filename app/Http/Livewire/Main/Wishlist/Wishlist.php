<?php

namespace App\Http\Livewire\Main\Wishlist;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Component
{

    public $wishlist;

    public function mount()
    {
        $this->wishlist = Auth::User()->wishlist;
    }


    public function render()
    {
        return view('livewire.main.wishlist.wishlist');
    }
}
