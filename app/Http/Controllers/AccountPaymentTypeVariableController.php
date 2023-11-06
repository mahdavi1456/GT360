<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountPaymentTypeVariable;
use App\Models\PaymentType;
use App\Models\PaymentTypeVariable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AccountPaymentTypeVariableController extends Controller
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
    public function create(PaymentType $paymentType)
    {
        $account_id = Auth::user()->account->id;
        $account = Account::find($account_id);
        if (!$account) {
            Alert::error('خطا', 'خطا در احراز هویت لطفا با پشتیبانی تماس بگیرید.');
            return back();
        }
        $payment_type_variables = $paymentType->variables;

        return view('admin.shop_setting.account-payment-type-variables', compact('payment_type_variables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $account_id = Auth::user()->account_id;

        $variable_values = $request->input('variable_values');
        $variable_ids = $request->input('variable_ids');


        foreach ($variable_ids as $key => $variable_id) {
            AccountPaymentTypeVariable::updateOrCreate([
                'account_id' => $account_id,
                'variable_id' => $variable_id
            ], [
                'account_id' => $account_id,
                'variable_id' => $variable_id,
                'variable_value' => $variable_values[$key],
            ]);
        }

        Alert::success('موفق', 'تغییرات با موفقیت ذخیره شدند.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
