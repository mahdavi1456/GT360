<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $customerId = 1;

        $customer = Customer::find($customerId);
        $customerAddresses = $customer->addresses;

        $PaymentTypes = PaymentType::all();

        return view('front.shop.checkout', compact('customer', 'customerAddresses', 'PaymentTypes'));
    }
}
