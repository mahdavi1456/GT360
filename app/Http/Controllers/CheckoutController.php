<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($customer_id)
    {

        $customer = Customer::find($customer_id);
        $customerAddresses = $customer->addresses;

        $PaymentTypes = PaymentType::all();

        return view('front.shop.checkout', compact('customer', 'customerAddresses', 'PaymentTypes'));
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

        return redirect()->route('checkout', ['customer_id' => $customer_id]);
    }
}
