<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::query()->orderBy('created_at', 'desc')->get();

        return view('front.account.list', compact('accounts'));
    }
}
