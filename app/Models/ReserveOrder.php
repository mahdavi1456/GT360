<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveOrder extends Model
{
    use HasFactory;

    protected $table = "reserve_orders";
    protected $guarded = [];
}
