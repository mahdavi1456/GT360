<?php

namespace App\Http\Controllers;

use App\Models\ReserveParts;
use App\Models\ReservePlan;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class ReservePlanController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->year)) {
            $currentYear = $request->year;
            $currentMonth = $request->month;
        } else {
            $v = verta();
            $currentYear = $v->year;
            $currentMonth = $v->month;
        }
        $reserveParts = ReserveParts::all();
        $reservePlanModel = New ReservePlan;
        return view('admin.reserve.plan.index', compact('reserveParts', 'currentYear', 'currentMonth', 'reservePlanModel', 'request'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        parse_str($request->list, $data);
        foreach ($data as $key => $value) {
            $l = explode('|', $key);
            $name = str_replace('_', ' ', $l[1]);
            $details = str_replace('_', ' ', $l[2]);
            $rp_date = $l[3];
            $price = $l[4];
            $rp_count = $value;

            if ($value) {
                $check = ReservePlan::where('rp_date', $rp_date)->where('name', $name)->where('details', $details)->first();
                if ($check) {
                    $rp = ReservePlan::find($check->id);
                    $rp->rp_count = $rp_count;
                    $rp->price = $price;
                    $rp->save();
                } else {
                    ReservePlan::create([
                        'name' => $name,
                        'details' => $details,
                        'price' => $price,
                        'rp_date' => $rp_date,
                        'rp_count' => $rp_count
                    ]);
                }
            }
        }
    }

    public function show(Request $request)
    {
        if (isset($request->year)) {
            $currentYear = 1403;
            $currentMonth = 5;
        } else {
            $currentYear = 1402;
            $currentMonth = 3;
        }
        $reserveParts = ReserveParts::all();
        $reservePlanModel = New ReservePlan;
        return view('admin.reserve.plan.index', compact('reserveParts', 'currentYear', 'currentMonth', 'reservePlanModel'));
    }

    public function edit(ReservePlan $reservePlan)
    {
        //
    }

    public function update(Request $request, ReservePlan $reservePlan)
    {
        //
    }

    public function destroy(ReservePlan $reservePlan)
    {
        //
    }
}
