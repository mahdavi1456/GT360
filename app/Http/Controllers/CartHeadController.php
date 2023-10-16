<?php

namespace App\Http\Controllers;

use App\Models\CartBody;
use App\Models\CartHead;
use App\Models\Discount;
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

        $cartItemCount = fa_number($cart->bodies->count());

        $product = Product::find($request->product);
        if ($product) {
            $this->cartBody($cart, $product);

            $cart->total_price = $cart->totalPrice();
            $cart->save();

            return response()->json(array(
                'cartItemCount' => $cartItemCount
            ), 200);
        } else {
            return response()->json(array(
                'message' => 'محصول یافت نشد.'
            ), 404);
        }
    }

    public function showCart(Request $request)
    {
        if (!is_null($request->cookie('cart-token'))) 
            $cart = CartHead::where('token', $request->cookie('cart-token'))->first();

        if (!isset($cart))
            $cart = $this->create();

        $cartItemCount = fa_number($cart->bodies->count());

        $bodies = $cart->bodies;

        return view('front.shop.cart', compact('cart', 'bodies', 'cartItemCount'));
    }

    public function removeFromCart(CartBody $body)
    {
        $body->delete();
        $cart = $body->head;
        $cart->total_price = $cart->totalPrice();
        $cart->save();
        $totlaPrice = fa_number($cart->totalPrice());
        $cartItemCount = fa_number($cart->bodies->count());
        return response()->json(array(
            'totalPrice' => $totlaPrice,
            'cartItemCount' => $cartItemCount,
            'cart' => $cart->id
        ), 200);
    }

    public function amount(Request $request, CartBody $body)
    {
        $body->product_count = $request->amount;
        $body->save();
        $cart = $body->head;
        $cart->total_price = $cart->totalPrice();
        $cart->save();
        $bodyPrice = fa_number($body->total());
        $totlaPrice = fa_number($cart->totalPrice());
        return response()->json(array(
            'bodyPrice' => $bodyPrice,
            'totalPrice' => $totlaPrice,
            'cart' => $cart->id
        ), 200);
    }
    
    public function discount(Request $request, CartHead $cart)
    {
        $discount = Discount::query()->where('title', $request->discount)->first();
        if ($discount) {
            if ($discount->isValid()) {
                if ($discount->isValidCart($cart)) {
                    if ($discount->type() == 'price') {
                        $discount_price = $discount->price;
                        $discount_value = $discount->price;
                    } elseif ($discount->type() == 'percent') {
                        $discount_price = $cart->total_price * ($discount->percent / 100);
                        $discount_value = $discount->percent;
                    }
                    $final_price = $cart->total_price - $discount_price;
                    $cart->update([
                        'discount_id' => $discount->id,
                        'discount_title' => $discount->title,
                        'discount_description' => $discount->details,
                        'discount_type' => $discount->type(),
                        'discount_value' => $discount_value,
                        'discount_price' => $discount_price,
                        'final_price' => $final_price
                    ]);
                    return response()->json(array(
                        'finalPrice' => fa_number($final_price),
                        'discountPrice' => fa_number($discount_price),
                    ), 200);
                } else {
                    return response()->json(array(
                        'message' => 'کد تخفیف وارد شده قابل استفاده نمی باشد.',
                    ), 404);
                }
            } else {
                return response()->json(array(
                    'message' => 'کد تخفیف وارد شده اعتبار ندارد.',
                ), 404);
            }
        } else {
            return response()->json(array(
                'message' => 'کد تخفیف یافت نشد.',
            ), 404);
        }
    }

    public function removeDiscount(CartHead $cart)
    {
        $cart->update([
            'discount_id' => null,
            'discount_title' => null,
            'discount_description' => null,
            'discount_type' => null,
            'discount_value' => null,
            'discount_price' => null,
            'final_price' => $cart->total_price,
        ]);
        return response()->json(array(
            'finalPrice' => fa_number($cart->total_price),
            'discountPrice' => fa_number(0),
        ), 200);
    }
}
