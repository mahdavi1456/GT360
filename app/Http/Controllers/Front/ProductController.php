<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->account) {
            $account = Account::find($request->account);
            if ($account)
                $products = $account->products();
            else
                return abort(404);
        } else {
            $products = Product::query()->orderBy('created_at', 'desc')->get();
        }

        return view('front.product.list', compact('products'));
    }
}
