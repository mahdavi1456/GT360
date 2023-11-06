<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPaymentTypeVariable extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function variable()
    {
        return $this->belongsTo(PaymentTypeVariable::class, 'variable_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
