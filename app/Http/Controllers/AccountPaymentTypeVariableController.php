<?php

namespace App\Http\Controllers;

use App\Models\AccountPaymentTypeVariable;
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $account_id = Auth::user()->account->id;
        $payment_type_variables = AccountPaymentTypeVariable::where('account_id', $account_id)->get();

        $payment_type_variables = PaymentTypeVariable::where('payment_type_id', $id)->get();
        return view('admin.shop_setting.account-payment-type-variables', compact('payment_type_variables', 'payment_type_variables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'variable_values' => 'required|array',
            'variable_ids' => 'required|array',
        ]);

        $account_id = Auth::user()->account_id;

        $variableValues = $request->input('variable_values');
        $variableIds = $request->input('variable_ids');


        foreach ($variableIds as $key => $variableId) {
            $variable = new AccountPaymentTypeVariable();
            $variable->variable_id = $variableId;
            $variable->account_id = $account_id;
            $variable->variable_value = $variableValues[$key];
            $variable->save();
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
