<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function showPrice()
    {
        if (isset($this->off_price))
            echo fa_number(number_format($this->off_price)) . '<br><s>' . fa_number(number_format($this->real_price)) . '</s>';
        else
            echo fa_number(number_format($this->real_price));
    }
}
