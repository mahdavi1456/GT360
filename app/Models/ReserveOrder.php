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
    public function scopeFilter($query) {
        // if (request()->filled('device')) {
        //     $query->where(function ($query){
        //         foreach (request('device') as  $key => $value) {
        //             if ($key == 0) {
        //                 $query->where('device', 'like', '%' . $value . '%');
        //             } else {
        //                 $query->orWhere('device', 'like', '%' . $value . '%');
        //             }
        //         }
        //     });
        // }
        if (request()->filled('sans')) {

            $query->where('rp_id', 'like', '%' . request('sans') . '%');
        }
        if (request()->filled('mobile')) {

            $query->where('ro_mobile', 'like', '%' . request('mobile') . '%');
        }
        if (request()->filled('status')) {
            $query->where('ro_status', 'like', '%' . request('status') . '%');
        }
        if (request()->filled('from')) {
            $from = verta()->parse(request('from'))->datetime();
            $query->where('created_at', '>=', $from);
            // $query->orWhereDate('created_at', $from);
        }
        if (request()->filled('to')) {
            $to = verta()->parse(request('to'))->toCarbon()->addDay();
           // $query->WhereDate('created_at', $to);
            $query->where('created_at', '<=', $to);
        }
    }
}
