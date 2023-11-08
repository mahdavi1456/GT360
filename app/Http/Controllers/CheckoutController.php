<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\CartHead;
use App\Models\Checkout;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\PaymentType;
use App\Models\Transport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $customer = auth('customer')->user();
        $customerAddresses = $customer->addresses;
        $cart = CartHead::where('token', $request->cookie('cart-token'))->first();
        $paymentTypes = $cart->account->paymentTypes;
        $transports = $cart->account->transports;
        $addons = $cart->account->addons;
        $checkout = $cart->checkout;
        return view('front.shop.checkout', compact('checkout', 'customer','customerAddresses', 'cart', 'paymentTypes','transports', 'addons'));
    }

    public function completeInfo($customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('front.customer.completeInfo', compact('customer_id'));
    }

    public function storeInfo(Request $request, $customer_id)
    {
        $validat = $request->validate([
            'name' => 'required|string|max:255',
            'family' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $customer =  Customer::find($customer_id);

        $customer->update([
            'name' => $validat['name'],
            'family' => $validat['family']
        ]);

        CustomerAddress::create([
            'customer_id' => $customer->id,
            'state' =>  $validat['state'],
            'city' =>  $validat['city'],
            'address' =>   $validat['address']
        ]);

        return redirect()->route('checkout');
    }

    public function transportSelect(Request $request)
    {
        $active = $request->active;
        $transport = Transport::find($request->transport_id);
        $checkout = Checkout::find($request->checkout_id);

        $checkout->transport_id = $transport->id;
        $checkout->transport_title = $transport->title;
        $checkout->transport_price = $transport->tprice;
        $checkout->transport_details = $transport->tdetails;
        $checkout->price = $checkout->price();
        $checkout->save();

        return $checkout->loadFactor();
    }

    public function addonSelect(Request $request)
    {
        $active = $request->active;
        $addon = Addon::find($request->addon_id);
        $checkout = Checkout::find($request->checkout_id);

        if ($checkout->addons->contains($addon->id)) {
            $checkout->addons()->detach($addon->id);
        } else {
            $checkout->addons()->attach($addon->id, [
                'addon_title' => $addon->title,
                'addon_details' => $addon->details,
                'addon_off_price' => $addon->off_price,
                'addon_real_price' => $addon->real_price,
            ]);
        }

        return;
    }

    public function loadFactor(Request $request) {
        $checkout = Checkout::find($request->checkout_id);

        $checkout->price = $checkout->price();
        $checkout->save();

        return $checkout->loadFactor();
    }
}
