<?php

namespace App\Http\Controllers;

use App\Models\ConfirmCustomer;
use Illuminate\Http\Request;

class ConfirmCustomerController extends Controller
{
    public function check(Request $request)
    {
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
            return response([
                'status' => false
            ], 400);
        }
    }
}
