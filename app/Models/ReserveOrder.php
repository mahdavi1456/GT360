<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveOrder extends Model
{
    use HasFactory;

    protected $table = "reserve_orders";
    protected $guarded = [];
    public function getStatusValueAttribute() {
        switch ($this->ro_status) {
            case '1':
                return 'ناموفق';
                break;
            case '2':
                return 'موفق';
                break;
            case '0':
                return 'قبل از درگاه پرداخت';
                break;

            default:
            return $this->status;
                break;
        }
    }
}
