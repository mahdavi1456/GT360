<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    Public function products () {
        Return $this->belongsToMany(Product::class, "product_category", "category_id", "product_id");
        }
}
