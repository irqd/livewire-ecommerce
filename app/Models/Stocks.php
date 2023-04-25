<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stocks extends Model
{
    use HasFactory;
    protected $table = 'stocks';

    public $status = '1'; // Set default value of status property to 1

    protected $fillable = [
        'name',
        'quantity',
        'original_price',
        'selling_price',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'products_id', 'id');
    }

    public function shoppingCarts()
    {
        return $this->belongsToMany(ShoppingCart::class, 'shopping_cart_stock')
                    ->withPivot('quantity');
    }
}
