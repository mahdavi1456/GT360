<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transports = Transport::all();
        return view('admin.transport.list', compact('transports'));
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
            'tprice' => 'required|numeric',
            'tdetails' => 'nullable|string',
        ]);

        $transport = new Transport();
        $transport->title = $validatedData['title'];
        $transport->tprice = $validatedData['tprice'];
        $transport->tdetails = $validatedData['tdetails'];

        $transport->save();

        Alert::success('موفق', 'مورد جدید با موفقیت ایجاد شد.');
        return redirect()->route('transport.index');

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
        $transport = Transport::findOrFail($id);
        return view('admin.transport.edit', compact('transport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'tprice' => 'required|numeric',
            'tdetails' => 'nullable|string',
        ]);

        $transport = Transport::findOrFail($id);

        $transport->title = $validatedData['title'];
        $transport->tprice = $validatedData['tprice'];
        $transport->tdetails = $validatedData['tdetails'];

        $transport->save();

        Alert::success('موفق', 'مورد جدید با موفقیت ویرایش شد.');
        return redirect()->route('transport.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transport = Transport::findOrFail($id);
        $transport->delete();

        Alert::success('موفق', 'مورد جدید با موفقیت حذف شد.');
        return redirect()->route('transport.index');
    }
}
