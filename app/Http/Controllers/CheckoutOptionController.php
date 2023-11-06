<?php

namespace App\Http\Controllers;

use App\Models\CheckoutOption;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $checkoutOptions = CheckoutOption::all();
        return view('admin.checkout-option.index', compact('checkoutOptions'));
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
        $validated = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'real_price' => 'required|numeric'
        ]);

        $product = CheckoutOption::updateOrCreate([
            'id' => $request->id
        ], [
            'title' => $request->title,
            'details' => $request->details,
            'off_price' => $request->off_price,
            'real_price' => $request->real_price,
            'show_status' => $request->show_status,
            'min_price' => $request->min_price
        ]);

        Alert::success('موفق', 'افزودنی با موفقیت ایجاد شد.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CheckoutOption $CheckoutOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CheckoutOption $CheckoutOption)
    {
        //
        $checkoutOptions = CheckoutOption::all();
        return view('admin.checkout-option.index', compact('checkoutOptions', 'CheckoutOption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CheckoutOption $CheckoutOption)
    {
        //
        $validated = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'real_price' => 'required|numeric'
        ]);

        $product = CheckoutOption::create([
            'title' => $request->title,
            'details' => $request->details,
            'off_price' => $request->off_price,
            'real_price' => $request->real_price,
            'show_status' => $request->show_status,
            'min_price' => $request->min_price
        ]);

        Alert::success('موفق', 'افزودنی با موفقیت ایجاد شد.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $CheckoutOption = CheckoutOption::findOrFail($id);
        $CheckoutOption->delete();

        Alert::success('موفق', 'افزودنی با موفقیت حذف شد.');
        return redirect()->route('checkout-option.index');
    }
}
