<?php

namespace App\Http\Controllers;

use App\Models\ReserveOrder;
use Illuminate\Http\Request;

class ReserveOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      
        $reserveOrders = ReserveOrder::latest()->get();
        return view('admin.reserve.order.index', compact('reserveOrders','request'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(ReserveOrder $reserveOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReserveOrder $reserveOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReserveOrder $reserveOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReserveOrder $reserveOrder)
    {
        //
    }
}
