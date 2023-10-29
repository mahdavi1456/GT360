<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
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

        $validate = $request->validate(
            [
                'mobile' => 'required|numeric|digits:11'
            ],
            [
                'mobile.required' => 'فیلد موبایل الزامی است.',

                'mobile.digits' => 'موبایل باید دقیقاً 11 رقم باشد',
            ]
        );

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

    }

    public function resendLoginCode(Request $request)
    {

        $validate = $request->validate(
            [
                'mobile' => 'required|numeric|digits:11'
            ],
            [
                'mobile.required' => 'فیلد موبایل الزامی است.',
                'mobile.digits' => 'موبایل باید دقیقاً 11 رقم باشد',
            ]
        );

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

        $validate = $request->validate(
            [
                'code' => 'required|string|max:4'
            ],
            [
                'code.required' => 'فیلد کد الزامی است.',
            ]
        );

        $customer = Customer::where('mobile', $request->mobile)->first();

        $randomNumber = Cache::get('remember_token');

        $userEnteredCode = $validate['code'];

        if ($userEnteredCode == $randomNumber) {

            if($customer->status == 'inactive') {

                $customer->update([
                    'status' => 'active'
                ]);


            $customer_id = $customer->id;

            return response()->json(['customer_id' => $customer_id, 'redirect' => 'completeInfo']);

            }

            $customer_id = $customer->id;

            return response()->json(['customer_id' => $customer_id, 'redirect' => 'checkout']);

        } else {

            return response()->json(['error' => 'کد وارد شده اشتباه است'], 400);
        }


    }
}
