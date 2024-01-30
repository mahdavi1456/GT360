<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\CartHead;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
     
        $accounts = Account::where('slug', '!=', null)->where('company', '!=', null)->get();

        $cartItemCount = fa_number(0);

        if (!is_null($request->cookie('cart-token'))) {
            $cart = CartHead::where('token', $request->cookie('cart-token'))->first();
            if ($cart)
                $cartItemCount = fa_number($cart->bodies->count());
        }

        return view('v1', compact('accounts', 'cartItemCount'));
    }
}
