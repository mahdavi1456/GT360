<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'visits';

    public static function dashboardDayVisit()
    {
        return Visit::whereDate('created_at', today())->count();
    }
    public function scopeFilter($query)
    {




        if (request()->filled('device')) {
            $query->where(function ($query){
                foreach (request('device') as  $key => $value) {
                    if ($key == 0) {
                        $query->where('device', 'like', '%' . $value . '%');
                    } else {
                        $query->orWhere('device', 'like', '%' . $value . '%');
                    }
                }
            });
        }
        if (request()->filled('url')) {

            $query->where('url', 'like', '%' . request('url') . '%');
        }
        if (request()->filled('ip')) {
            $query->where('ip', 'like', '%' . request('ip') . '%');
        }
        if (request()->filled('browser')) {
            $query->where(function ($query) {
                foreach (request('browser') as $key => $value) {
                    if ($key == 0) {
                        $query->where('browser', 'like', '%' . $value . '%');
                    } else {
                        $query->orWhere('browser', 'like', '%' . $value . '%');
                    }
                }
            });
        }
        if (request()->filled('from')) {
            $from = verta()->parse(request('from'))->datetime();
            $query->where('created_at', '>=', $from);
            // $query->orWhereDate('created_at', $from);
        }
        if (request()->filled('to')) {
            $to = verta()->parse(request('to'))->datetime();
           // $query->WhereDate('created_at', $to);
            $query->where('created_at', '<=', $to);
        }
    }
}
