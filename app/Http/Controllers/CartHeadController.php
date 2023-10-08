<?php

namespace App\Http\Controllers;

use App\Models\CartBody;
use App\Models\CartHead;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartHeadController extends Controller
{
    public function create()
    {
        $token = Str::random(16) . '_' . time();
        cookie()->queue('cart-token', $token, 2628000);

        $cart = CartHead::create([
            'token' => $token,
            'cart_status' => 0,
            'total_price' => 0,
        ]);

        return $cart;
    }

    public function addToCart(Request $request)
    {
        if (is_null($request->cookie('cart-token'))) {
            $cart = $this->create();
        } else {
            $cart = CartHead::where('token', $request->cookie('cart-token'))->first();
        }
        if ($cart) {
            $product = Product::find($request->product);
            if ($product) {
                $body = CartBody::create([
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'product_price' => $product->sales_price ?? 0,
                    'product_count' => $request->amount ?? 1,
                    'cart_id' => $cart->id,
                ]);

                $cart->total_price += $body->product_price;
                $cart->save();

            } else {
                return response()->json(array(
                    'message' => 'محصول یافت نشد.'
                ), 404);
            }
        } else {
            return response()->json(array(
                'message' => 'خطایی پیش آمده است لطفا با پشتیبانی تماس بگیرید.'
            ), '404');
        }
    }
}
