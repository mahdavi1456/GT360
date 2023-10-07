<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
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

    public function products()
    {
        $users = $this->users;
        $products = new Collection;
        foreach ($users as $user) {
            $products = $products->merge($user->products);
        }
        return $products;
    }

    public function categories()
    {
        $users = $this->users;
        $categories = new Collection;
        foreach ($users as $user) {
            $categories = $categories->merge($user->categories);
        }
        return $categories;
    }
}
