<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function addresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }

}
