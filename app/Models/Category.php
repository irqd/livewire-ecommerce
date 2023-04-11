<?php

namespace App\Models;

use App\Models\Brands;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [

        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];


    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function brands()
    {
        return $this->hasMany(Brands::class);
    }
}
