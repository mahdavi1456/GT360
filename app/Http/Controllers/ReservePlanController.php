<?php

namespace App\Http\Controllers;

use App\Servieses\Sms;
use App\Models\Project;
use App\Models\ReservePart;
use App\Models\ReservePlan;
use App\Models\ReserveOrder;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use App\Models\ConfirmCustomer;

class ReservePlanController extends Controller
{

    public function index(Request $request)
    {
        $projectId= Project::checkOpenProject(auth()->user()->account_id)->project_id;
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
        $reserveParts = ReservePart::where(['project_id'=>$projectId])->latest()->get();
        $reservePlanModel = new ReservePlan;
        return view('admin.reserve.plan.index', compact('reserveParts', 'date', 'currentYear', 'currentMonth', 'reservePlanModel', 'request'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $projectId= Project::checkOpenProject(auth()->user()->account_id)->project_id;
        parse_str($request->list, $data);
        foreach ($data as $key => $value) {
            $l = explode('|', $key);
            $name = str_replace('_', ' ', $l[1]);
            $details = str_replace('_', ' ', $l[2]);
            $rp_date = $l[3];
            $price = $l[4];
            $rp_count = $value;

            if ($value) {
                $check = ReservePlan::where('rp_date', $rp_date)->where('project_id',$projectId)->where('name', $name)->where('details', $details)->first();

                if ($check) {
                    $rp = ReservePlan::find($check->id);
                    if($rp->rp_count!=$rp_count){
                        $delta=$rp_count-$rp->rp_count;

                        $rp->left_count+=$delta;
                        if ($rp->left_count<0) {
                            $rp->left_count=0;
                        }
                    }
                    $rp->rp_count = $rp_count;
                    $rp->price = $price;

                    $rp->save();
                } else {
                    ReservePlan::create([
                        'name' => $name,
                        'details' => $details,
                        'price' => $price,
                        'rp_date' => $rp_date,
                        'rp_count' => $rp_count,
                        'left_count' => $rp_count,
                        'project_id'=>$projectId
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
        $projectId=Project::where('slug',request('slug'))->first()->id;
        $rp_date = $request->rp_date;
        $reservePart = ReservePart::find($request->id);
        $ro_date = $rp_date;
        $rp_name = $reservePart->name;
        $rp_details = $reservePart->details;
        $rs_price = $reservePart->price;
        if ($reservePart->off_price) {
            $rs_price=$reservePart->off_price;
        }
        $rPlan=ReservePlan::where(['rp_date'=>$rp_date,'name'=>$rp_name,'project_id'=>$projectId])->first();
        // $ro = ReserveOrder::create([
        //     'rp_id' => $reservePart->id,
        //     'ro_date' => $ro_date,
        //     'rp_name' => $rp_name,
        //     'rp_details' => $rp_details,
        //     'rs_price' => $rs_price,
        //     'ro_count' => 1
        // ]);

        $reserevePlanModel = new ReservePlan;
        return $reserevePlanModel->InfoForm($reservePart->id, $ro_date, $rp_name, $rp_details, $rs_price,$rPlan->left_count);
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
       $code= $confirmCustomerModel->set("mobile", $request->ro_mobile);
        $paras = ['code' => $code];
        Sms::sendWithPattern('7wvqeoyeag6a8ln', $paras, $request->ro_mobile);
        $reserevePlanModel = new ReservePlan;
        return $reserevePlanModel->ConfirmMobileForm($reserveOrder->id, $request->ro_mobile);
    }
    public function resendCode(Request $req){
        $confirmCustomerModel = new ConfirmCustomer;
        $confirmCustomerModel->set("mobile", $req->mobile);
        return true;
    }
}
