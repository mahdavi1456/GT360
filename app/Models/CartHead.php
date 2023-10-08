<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHead extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bodies()
    {
        return $this->hasMany(CartBody::class, 'cart_id');
    }
}
