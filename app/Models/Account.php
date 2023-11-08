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

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'account_id');
    }

    public function categories()
    {

        return $this->hasMany(Category::class);
    }

    public function paymentTypes()
    {
        return $this->belongsToMany(PaymentType::class, 'account_payment_types', 'account_id', 'payment_type_id');
    }

    public function paymentTypeVariables()
    {
        return $this->hasMany(AccountPaymentTypeVariable::class);
    }

    public function transports()
    {
        return $this->belongsToMany(Transport::class, 'account_transports', 'account_id', 'transport_id');
    }

    public function addons()
    {
        return $this->hasMany(Addon::class);
    }
}
