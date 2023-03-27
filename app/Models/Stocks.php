<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stocks extends Model
{
    use HasFactory;
    protected $table = 'stocks';

    protected $fillable = [
        'name',
        'quantity',
        'original_price',
        'selling_price',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
