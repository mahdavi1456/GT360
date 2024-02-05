<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservePlan extends Model
{
    use HasFactory;

    protected $table = "reserve_plans";
    protected $guarded = [];

    public function getValue($name, $details, $rp_date)
    {
        $rp = ReservePlan::where('name', $name)->where('details', $details)->where('rp_date', $rp_date)->first();
        if ($rp) {
            return $rp->rp_count;
        } else {
            return null;
        }
    }

}
