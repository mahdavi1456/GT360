<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentTypes = PaymentType::orderBy('display_order')->get();
        return view('admin.payments_type.index', compact('paymentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payments_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'display_order' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $paymentType = PaymentType::create($validatedData);

        Alert::success('موفق', 'نوع پرداخت با موفقیت ایجاد شد.');
        return redirect()->route('payments_type.index');

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
        $paymentType = PaymentType::findOrFail($id);
        return view('admin.payments_type.edit', compact('paymentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'display_order' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $paymentType = PaymentType::findOrFail($id);

        $paymentType->update($validatedData);

        Alert::success('موفق', 'نوع پرداخت با ویرایش ایجاد شد.');
        return redirect()->route('payments_type.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paymentType = PaymentType::findOrFail($id);
        $paymentType->delete();

        Alert::success('موفق', 'مورد با موفقیت حذف شد.');
        return redirect()->back();

    }
}
