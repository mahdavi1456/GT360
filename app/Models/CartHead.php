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

    public function totalPrice()
    {
        $total = 0;
        foreach ($this->bodies as $body) {
            if (!is_null($body->product_offer))
                $total += ($body->product_offer * $body->product_count);
            else
                $total += ($body->product_price * $body->product_count);
        }
        return $total;
    }
}
