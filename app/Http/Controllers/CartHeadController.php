<?php

namespace App\Http\Controllers;

use App\Models\CartBody;
use App\Models\CartHead;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartHeadController extends Controller
{
    protected function create()
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

    protected function cartBody(CartHead $cart, Product $product)
    {
        $body = CartBody::query()->where('cart_id', $cart->id)->where('product_id', $product->id)->first();
        if ($body) {
            if (isset(request()->amount))
                $body->product_count += request()->amount;
            else
                $body->product_count ++;

            $body->product_price = $product->sales_price;
            $body->product_offer = $product->offer_price;
            $body->save();
        } else {
            $body = CartBody::create([
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'product_price' => $product->sales_price,
                'product_offer' => $product->offer_price ?? null,
                'product_count' => request()->amount ?? 1,
                'cart_id' => $cart->id,
            ]);
        }
    }

    public function addToCart(Request $request)
    {
        if (!is_null($request->cookie('cart-token'))) 
            $cart = CartHead::where('token', $request->cookie('cart-token'))->first();

        if (!isset($cart))
            $cart = $this->create();

        $product = Product::find($request->product);
        if ($product) {
            $this->cartBody($cart, $product);

            $cart->total_price = $cart->totalPrice();
            $cart->save();

        } else {
            return response()->json(array(
                'message' => 'محصول یافت نشد.'
            ), 404);
        }
    }
}
