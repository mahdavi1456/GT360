<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $tabele = "accounts";
    protected $guarded = [];

    Public function users() {
        Return $this->hasMany(User::class);
    }
}
