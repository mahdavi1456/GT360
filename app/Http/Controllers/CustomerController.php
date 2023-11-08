<?php

namespace App\Http\Controllers;

use App\Models\CartHead;
use App\Models\Checkout;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function loginForm()
    {
        return view('front.customer.login');
    }

    public function sendLoginCode(Request $request)
    {

        $validate = $request->validate([
                'mobile' => 'required|numeric|digits:11|regex:/^09[0-9]{9}/'
            ], [
                'mobile.required' => 'فیلد موبایل الزامی است.',
                'mobile.digits' => 'موبایل باید دقیقاً 11 رقم باشد',
            ]);

        $code = rand(1000, 9999);

        $customer = Customer::where('mobile', $validate['mobile'])->first();
        if ($customer) {

            $customer->update([
                'remember_token' => $code
            ]);

            Cache::put('remember_token', $code, Carbon::now()->addSeconds(60));

            $mobile = $validate['mobile'];
            $message = 'کابر گرامی کد یکبار مصرف شما : ' . $code;

            // sendSMS($mobile, $message);

        } else {

            $customer = Customer::create([
                'mobile' => $validate['mobile'],
                'remember_token' => $code
            ]);

        }

        if (!is_null($request->cookie('cart-token'))) {
            $cart = CartHead::where('token', $request->cookie('cart-token'))->first();
            if ($cart) {
                $cartItemCount = fa_number($cart->bodies->count());
                $cart->update([
                    'customer_id' => $customer->id
                ]);
            }
        }
    }

    public function resendLoginCode(Request $request)
    {

        $validate = $request->validate([
                'mobile' => 'required|numeric|digits:11|regex:/^09[0-9]{9}/'
            ], [
                'mobile.required' => 'فیلد موبایل الزامی است.',
                'mobile.digits' => 'موبایل باید دقیقاً 11 رقم باشد',
            ]);

        $customer = Customer::where('mobile', $validate['mobile'])->first();
        if ($customer) {
            $code = rand(1000, 9999);
            $mobile = $validate['mobile'];
            $username = $mobile;

            $customer->update([
                'remember_token' => $code
            ]);

            Cache::put('remember_token', $code, Carbon::now()->addSeconds(60));

            $message = 'کابر گرامی کد یکبار مصرف شما : ' . $code;

            // sendSMS($mobile, $message);
        }
    }


    public function confirmLogin(Request $request)
    {
        $validate = $request->validate([
                'code' => 'required|string|max:4'
            ], [
                'code.required' => 'فیلد کد الزامی است.',
            ]);

        $customer = Customer::where('mobile', $request->mobile)->first();
        $randomNumber = $customer->remember_token;
        $userEnteredCode = $validate['code'];

        if ($userEnteredCode == $randomNumber) {
            if($customer->status == 'inactive') {
                $customer->update([
                    'status' => 'active'
                ]);
            }

            Auth::guard('customer')->login($customer);

            $cart = CartHead::where('token', $request->cookie('cart-token'))->first();
            if ($cart) {
                $checkout = Checkout::updateOrCreate([
                    'cart_id' => $cart->id,
                ], [
                    'cart_id' => $cart->id,
                    'account_id' => $cart->account_id,
                    'price' => $cart->final_price ?? $cart->total_price,
                    'customer_id' => $customer->id
                ]);
            }

            $customer_id = $customer->id;
            return response()->json(['customer_id' => $customer_id, 'redirect' => 'completeInfo']);
        } else {
            return response()->json(['message' => 'کد وارد شده اشتباه است'], 400);
        }
    }
}
