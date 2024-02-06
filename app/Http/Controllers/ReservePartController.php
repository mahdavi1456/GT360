<?php

namespace App\Http\Controllers;

use App\Models\ReservePart;
use Illuminate\Http\Request;

class ReservePartController extends Controller
{

    public function index()
    {
        $reserveParts = ReservePart::all();
        return view('admin.reserve.part.index', compact('reserveParts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ReservePart::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'off_price' => $request->off_price,
            'status' => $request->status
        ]);
        $reserveParts = ReservePart::all();
        return view('admin.reserve.part.index', compact('reserveParts'));
    }

    public function show(ReservePart $reserveParts)
    {
        //
    }

    public function edit(ReservePart $reserveParts)
    {
        //
    }

    public function update(Request $request, ReservePart $reserveParts)
    {
        //
    }

    public function destroy(ReservePart $reserveParts)
    {
        //
    }
}
