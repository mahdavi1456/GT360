<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discount.list', compact('discounts'));
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'percent' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'validity_date' => 'nullable',
            'number' => 'nullable|string',
            'details' => 'nullable|string',
        ]);

        $validity_date = Carbon::parse(Verta::parse($validatedData['validity_date'])->formatGregorian('Y-m-d'));

        $discount = Discount::create([
            'title' => $validatedData['title'],
            'percent' => $validatedData['percent'] ?? null,
            'price' => $validatedData['price'] ?? null,
            'validity_date' => $validity_date,
            'number' => $validatedData['number'],
            'details' => $validatedData['details']
        ]);

        Alert::success('موفق', 'کد تخفیف با موفقیت ایجاد شد.');
        return redirect()->route('discount.index');
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
        $discount = Discount::findOrFail($id);
        return view('admin.discount.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $discount = Discount::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'percent' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'validity_date' => 'nullable',
            'number' => 'nullable|string',
            'details' => 'nullable|string',
        ]);


        $validity_date = Carbon::parse(Verta::parse($validatedData['validity_date'])->formatGregorian('Y-m-d'));

        $discount->update([
            'title' => $validatedData['title'],
            'percent' => $validatedData['percent'] ?? null,
            'price' => $validatedData['price'] ?? null,
            'validity_date' => $validity_date,
            'number' => $validatedData['number'],
            'details' => $validatedData['details']
        ]);

        Alert::success('موفق', 'کد تخفیف با موفقیت ویرایش شد.');
        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discount = Discount::find($id);
        $discount->delete();

        Alert::success('موفق', 'کد تخفیف با موفقیت حذف شد.');
        return redirect()->back();

    }
}
