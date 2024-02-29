<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmCustomer extends Model
{
    use HasFactory;
    protected $tabele = "confirm_customers";
    protected $guarded = [];

    public function set($method, $value)
    {
        $expireTime = 2;
        $code = rand(1, 9999);
        $expireAt = date('Y-m-d H:i:s', strtotime(' +' . $expireTime . ' minutes '));
        ConfirmCustomer::create([
            'method' => $method,
            'value' => $value,
            'code' => $code,
            'status' => 0,
            'expire_at' => $expireAt
        ]);
        return $code;
    }

    public function check($method, $value, $code)
    {
        $check = ConfirmCustomer::where('method', $method)->where('value', $value)->latest()->first();
        if ($check?->code==$code) {
            return $check;
        } else {
            return false;
        }
    }

}
