<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $tabele = "discounts";
    protected $guarded = [];

    public function isValid()
    {
        if (isset($this->deleted_at))
            return false;
        if (isset($this->validity_date))
            return $this->validity_date > now();
        if (isset($this->number))
            return $this->number != 0;
        if (!isset($this->validity_date) && !isset($this->number))
            return false;
        if ($this->type() == null)
            return false;

    }

    public function isValidCart(CartHead $cart)
    {
        $check = true;
        if (isset($this->min_cart) && $this->min_cart > $cart->total_price)
            $check = false;
        if (isset($this->max_cart) && $this->max_cart < $cart->total_price)
            $check = false;
        return $check;
    }

    public function type()
    {
        if (isset($this->price) && !isset($this->percent)) {
            return 'price';
        } elseif (!isset($this->price) && isset($this->percent)) {
            return 'percent';
        } elseif ((isset($this->price) && isset($this->percent)) || (!isset($this->price) && !isset($this->percent)) ) {
            return null;
        }
    }
}
