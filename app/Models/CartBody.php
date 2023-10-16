<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartBody extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function head()
    {
        return $this->belongsTo(CartHead::class, 'cart_id');
    }

    public function total()
    {
        $total = 0;
        if (!is_null($this->product_offer))
                $total += ($this->product_offer * $this->product_count);
        else
            $total += ($this->product_price * $this->product_count);
        return $total;
    }

    public function showPrice()
    {
        if (isset($this->product_offer))
            echo fa_number($this->product_offer) . '<br><s>' . fa_number($this->product_price) . '</s>';
        else 
            echo fa_number($this->product_price);
    }
}
