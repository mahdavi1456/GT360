<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $tabele = "accounts";
    protected $guarded = [];

    Public function users() {
        Return $this->hasMany(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'account_id');
    }

    public function categories()
    {

        return $this->hasMany(Category::class);
    }

}
