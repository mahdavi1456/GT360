<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AddonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Addons = Addon::query()->where('account_id', auth()->user()->account_id)->get();
        return view('admin.addon.index', compact('Addons'));
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
        $validated = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'real_price' => 'required|numeric'
        ]);

        $account_id = auth()->user()->account_id;

        $Addon = Addon::updateOrCreate([
            'id' => $request->id
        ], [
            'account_id' => $account_id,
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
    public function show(Addon $Addon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Addon $Addon)
    {
        $Addons = Addon::all();
        return view('admin.addon.index', compact('Addons', 'Addon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Addon $Addon)
    {
        $validated = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'real_price' => 'required|numeric'
        ]);

        $product = Addon::create([
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
        $Addon = Addon::findOrFail($id);
        $Addon->delete();

        Alert::success('موفق', 'افزودنی با موفقیت حذف شد.');
        return redirect()->route('addon.index');
    }
}
