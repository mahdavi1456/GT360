<?php

namespace App\Http\Controllers;

use App\Models\ReserveParts;
use Illuminate\Http\Request;

class ReservePartController extends Controller
{

    public function index()
    {
        $reserveParts = ReserveParts::all();
        return view('admin.reserve.part.index', compact('reserveParts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ReserveParts::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'off_price' => $request->off_price,
            'status' => $request->status
        ]);
        $reserveParts = ReserveParts::all();
        return view('admin.reserve.part.index', compact('reserveParts'));
    }

    public function show(ReserveParts $reserveParts)
    {
        //
    }

    public function edit(ReserveParts $reserveParts)
    {
        //
    }

    public function update(Request $request, ReserveParts $reserveParts)
    {
        //
    }

    public function destroy(ReserveParts $reserveParts)
    {
        //
    }
}
