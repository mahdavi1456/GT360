<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Servieses\Sms;
use App\Models\Account;
use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $setting = new Setting;
        return view('admin.auth.register', compact('setting'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'string', 'max:255'],
            'account_acl' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'mobile' => ['required', 'string', 'digits:11', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'ref_id'=>"nullable|exists:accounts,id",
        ],[
            'ref_id.exists'=>'کد معرف وجود ندارد'
        ]);
        $ref_id=0;
        if ($request->filled('ref_id')) {
            $ref_id=$request->ref_id;
        }
        $account = Account::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'family' => $request->family,
            'account_type' => $request->account_type,
            'account_acl' => $request->account_acl,
            'ref_id'=>$ref_id,
        ]);
        $setting = new Setting();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
            'family' => $request->family,
            'company_name' => $request->compony,
            'user_status' => 'Active',
            'user_type' => 'admin',
            'account_id' => $account->id
        ]);
        $paras = ['username' => $user->mobile, 'password' => $request->password];

        Sms::sendWithPattern('hiopokjsgtkplga', $paras, $user->mobile);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
