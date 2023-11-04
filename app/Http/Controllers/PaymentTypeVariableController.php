<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use App\Models\PaymentTypeVariable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentTypeVariableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $paymentVariables = $user->paymentTypeVariables;
        return view('admin.payments_type.variables', compact('paymentVariables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $payment_types = PaymentType::all();
        $paymentType_id = $request->paymentType_id;
        return view('admin.payments_type.create-variable', compact('payment_types', 'paymentType_id'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'label' => 'required',
        ]);

        PaymentTypeVariable::create([
            'user_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'label' => $validatedData['label'],
            'payment_type_id' => $request->paymentType_id
        ]);

        Alert::success('موفق', 'متغیر پرداخت ایجاد شد.');
        return redirect()->route('PaymentTypeVariable.index');

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
        $paymentVariable = PaymentTypeVariable::find($id);
        $payment_types = PaymentType::all();
        return view('admin.payments_type.edit-variable', compact('paymentVariable', 'payment_types'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'label' => 'required',
            'payment_type_id' => 'required|exists:payment_types,id',
        ], [
            'payment_types_id.exists' => 'انتخاب نوع پرداخت معتبر نیست.',
        ]);

        $paymentVariable = PaymentTypeVariable::find($id);

        $paymentVariable->update([
            'user_id' => Auth::user()->id,
            'name' => $validatedData['name'],
            'label' => $validatedData['label'],
            'payment_type_id' => $validatedData['payment_type_id']

        ]);

        Alert::success('موفق', 'متغیر پرداخت ویرایش شد.');
        return redirect()->route('PaymentTypeVariable.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paymentVariable = PaymentTypeVariable::find($id);
        $paymentVariable->delete();

        Alert::success('موفق', 'متغیر پرداخت حذف شد.');
        return redirect()->route('PaymentTypeVariable.index');

    }
}
