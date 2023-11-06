<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "payment_types";

    protected $guarded = [];

    public function accounts()
    {
        return $this->belongsToMany(Account::class, 'account_payment_types', 'payment_type_id', 'account_id');
    }

    public function variables()
    {
        return $this->hasMany(PaymentTypeVariable::class);
    }
}
