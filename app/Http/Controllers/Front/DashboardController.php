<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CartHead;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()->orderBy('created_at', 'desc')->get();

        if ($request->category) {
            $category = Category::find($request->category);
            if ($category) {
                $products = $category->products;
            } else {
                $products = [];
            }
        } else {
            $products = Product::query()->orderBy('created_at', 'desc')->get();
        }

        if (!is_null($request->cookie('cart-token'))) {
            $cart = CartHead::where('token', $request->cookie('cart-token'))->first();
            $cartItemCount = fa_number($cart->bodies->count());
        } else {
            $cartItemCount = fa_number(0);
        }

        return view('v1', compact('products', 'categories', 'cartItemCount'));
    }
}
