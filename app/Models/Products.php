<?php

namespace App\Models;

use App\Models\Stocks;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    
    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'featured',
        'meta_name',
        'meta_keyword',
        'meta_description',
        'brand_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stocks::class);
    }

}
