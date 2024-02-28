<?php

namespace App\Http\Controllers;

use App\Models\ReservePart;
use App\Models\ReservePlan;
use App\Models\ReserveOrder;
use App\Models\ConfirmCustomer;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class ReservePlanController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->year)) {
            $date = verta();
            $currentYear = $request->year;
            $currentMonth = $request->month;
            $date->year = $currentYear;
            $date->month = $currentMonth;
            //   dd( $currentYear, $currentMonth,$date);
        } else {
            $date = verta();
            $currentYear = $date->year;
            $currentMonth = $date->month;
            $date = verta();
        }
        $date->startMonth();
        $reserveParts = ReservePart::all();
        $reservePlanModel = new ReservePlan;
        return view('admin.reserve.plan.index', compact('reserveParts', 'date', 'currentYear', 'currentMonth', 'reservePlanModel', 'request'));
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
        $reserveParts = ReservePart::all();
        $reservePlanModel = new ReservePlan;
        return view('admin.reserve.plan.index', compact('reserveParts', 'currentYear', 'currentMonth', 'reservePlanModel'));
    }

    public function InfoForm(Request $request)
    {

        $rp_date = $request->rp_date;
        $reservePart = ReservePart::find($request->id);
        $ro_date = $rp_date;
        $rp_name = $reservePart->name;
        $rp_details = $reservePart->details;
        $rs_price = $reservePart->price;
        // $ro = ReserveOrder::create([
        //     'rp_id' => $reservePart->id,
        //     'ro_date' => $ro_date,
        //     'rp_name' => $rp_name,
        //     'rp_details' => $rp_details,
        //     'rs_price' => $rs_price,
        //     'ro_count' => 1
        // ]);

        $reserevePlanModel = new ReservePlan;
        return $reserevePlanModel->InfoForm($reservePart->id, $ro_date, $rp_name, $rp_details, $rs_price);
    }

    public function ConfirmMobileForm(Request $request)
    {
        $rp_id = $request->rp_id;
        $ro_count = $request->ro_count;
        $ro_name = $request->ro_name;
        $ro_date=$request->ro_date;
        $rs_price=$request->rs_price;
        $price=$ro_count * $rs_price;
        $reserveOrder = ReserveOrder::create([
                'rp_id'=>$rp_id,
                'slug'=>$request->slug,
                'ro_date' => $ro_date,
                'ro_name' => $ro_name,
                'rs_price' => $price,
                'ro_count' => $ro_count,
                'ro_mobile'=> $request->ro_mobile,
                'rp_details'=>$request->rp_details,
                'rp_name'=>$request->rp_name
        ]);
        $confirmCustomerModel = new ConfirmCustomer;
        $confirmCustomerModel->set("mobile", $request->ro_mobile);
        $reserevePlanModel = new ReservePlan;
        return $reserevePlanModel->ConfirmMobileForm($reserveOrder->id, $request->ro_mobile);
    }
    public function resendCode(Request $req){
        $confirmCustomerModel = new ConfirmCustomer;
        $confirmCustomerModel->set("mobile", $req->mobile);
        return true;
    }
}
