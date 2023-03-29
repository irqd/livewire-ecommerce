<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'filename',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
