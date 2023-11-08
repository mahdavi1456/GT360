<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class ShopSettingController extends Controller
{
    public function index()
    {
        $peyment_types = PaymentType::query()->where('status', 'active')->get();
        $transports = Transport::all();
        return view('admin.shop_setting.shop-setting', compact('peyment_types', 'transports'));
    }

    public function PaymentTypeToAccount(Request $request)
    {
        if ($request->payment_is_active === 'active') {
            $account = Auth::user()->account;
            $paymentType_id = $request->payment_type_id;

            if (!$account->paymentTypes->contains($paymentType_id)) {
                $account->paymentTypes()->attach($paymentType_id);

                $response = [
                    'message' => 'عملیات با موفقیت انجام شد.'
                ];

                return response()->json($response, Response::HTTP_OK);
            }
        } elseif ($request->payment_is_active === 'deactive') {
            $account = Auth::user()->account;
            $paymentType_id = $request->payment_type_id;

            if ($account->paymentTypes->contains($paymentType_id)) {
                $account->paymentTypes()->detach($paymentType_id);

                $response = [
                    'message' => 'عملیات با موفقیت انجام شد.'
                ];

                return response()->json($response, Response::HTTP_OK);
            }
        } else {
            return redirect()->back()->with('error', 'نوع پرداخت مجاز نیست.');
        }
    }

    public function transportToAccount(Request $request)
    {
        if ($request->transport_is_active === 'active') {
            $account = Auth::user()->account;
            $transport_id = $request->transport_id;

            if (!$account->transports->contains($transport_id)) {
                $account->transports()->attach($transport_id);

                $response = [
                    'message' => 'عملیات با موفقیت انجام شد.'
                ];

                return response()->json($response, Response::HTTP_OK);
            }
        } elseif ($request->transport_is_active === 'deactive') {
            $account = Auth::user()->account;
            $transport_id = $request->transport_id;

            if ($account->transports->contains($transport_id)) {
                $account->transports()->detach($transport_id);

                $response = [
                    'message' => 'عملیات با موفقیت انجام شد.'
                ];

                return response()->json($response, Response::HTTP_OK);
            }
        } else {
            return redirect()->back()->with('error', 'خطا در انجام عملیات.');
        }
    }
}
