<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTypeVariable extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    public function valueAccount($account_id)
    {
        $variable = AccountPaymentTypeVariable::query()
                                            ->where('variable_id', $this->id)
                                            ->where('account_id', $account_id)
                                            ->first();
        if (!$variable) {
            return null;
        }
        return $variable->variable_value;
    }

}
