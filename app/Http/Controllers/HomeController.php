<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\CartHead;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, $slug)
    {

        if($slug == 'login') {

            return view('admin.auth.login');
        }

        if($slug == 'register') {

            return view('admin.auth.register');
        }

        if($slug == 'forgot-password') {

            return view('admin.auth.forgot-password');
        }


        $account = Account::where('slug', $slug)->first();

        if (!$account) {

           return view('front.404.404');
        }

        $categories = $account->categories()->orderBy('created_at', 'desc')->get();

        $products = $account->products()->orderBy('created_at', 'desc')->get();

        if ($request->category) {
            $category = Category::find($request->category);
            if ($category) {
                $products = $category->products;
            } else {
                $products = [];
            }
        }

        $cartItemCount = fa_number(0);

        if (!is_null($request->cookie('cart-token'))) {
            $cart = CartHead::where('token', $request->cookie('cart-token'))->first();
            if ($cart)
                $cartItemCount = fa_number($cart->bodies->count());
        }



        return view('front.index', compact('products', 'categories', 'cartItemCount'));

    }
}
