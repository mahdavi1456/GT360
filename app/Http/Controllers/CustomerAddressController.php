<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerAddressController extends Controller
{
    public function addAddress(Request $request, $customer_id)
    {
        $validat = $request->validate([

            'details' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',

        ]);

        CustomerAddress::create([

            'customer_id' => $customer_id,
            'details' => $validat['details'],
            'state' => $validat['state'],
            'city' => $validat['city'],
            'address' => $validat['address'],

        ]);


        Alert::success('موفق', 'آدرس جدید با موفقیت ایجاد شد.');
        return redirect()->route('checkout', ['customer_id' => $customer_id]);

    }

}
