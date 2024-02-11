<?php

namespace App\Http\Controllers;

use App\Models\ReserveOrder;
use App\Models\Transaction;
use App\Servieses\IPG;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function start(Request $request)
    {
        $id = $request->id;
        $reserveOrder = ReserveOrder::find($id);
        $Price = $reserveOrder->rs_price;

        $ipg = new IPG();
        $ipg->start($id, "reserve", $Price);
    }
}
