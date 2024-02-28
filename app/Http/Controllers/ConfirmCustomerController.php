<?php

namespace App\Http\Controllers;

use App\Models\ConfirmCustomer;
use Illuminate\Http\Request;

class ConfirmCustomerController extends Controller
{
    public function check(Request $request)
    {
        if ($request->has('mobile')) {
            $mobile = $request->mobile;
            $code = $request->code;
            $confirmCustomerModel = new ConfirmCustomer;
            $st = $confirmCustomerModel->check("mobile", $mobile, $code);
            if ($st) {
                return response([
                    'id' => $st->id,
                    'status' => true
                ], 200);
            } else {
                $st2 = ConfirmCustomer::where('method', 'mobile')->where('value', $mobile)->where('code', $code)->first();
                if ($st2) {
                    return response([
                        'status' => false
                    ], 405);
                }

                return response([
                    'status' => false
                ], 400);
            }
        }
    }
}
