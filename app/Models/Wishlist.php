<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stocks()
    {
         return $this->belongsToMany(Stocks::class, 'shopping_cart_stock')
                        ->withPivot('quantity');

    }
}
