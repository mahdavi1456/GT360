<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    Public function categories () {
        Return $this->belongsToMany(Category::class, "product_category", "product_id", "category_id");
        }

}
