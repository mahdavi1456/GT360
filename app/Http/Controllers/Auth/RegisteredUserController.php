<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Servieses\Sms;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $setting=new Setting();
        return view('admin.auth.register',compact('setting'));
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'mobile' => ['required', 'string', 'digits:11', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $account = Account::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'family' => $request->family,
            'account_type' => $request->account_type,
            'account_acl'=>0
        ]);
        $setting= new Setting();
        $theme=$setting->getSetting('default_theme',0);
        $setting->updateSetting('active_theme',$theme,$account->id);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
            'family' => $request->family,
            'company_name' => $request->compony,
            'user_status' => 'Active',
            'user_type' => 'admin',
            'account_id'=>$account->id
        ]);
        $paras=['username'=>$user->mobile,'password'=>$request->password];
        Sms::sendWithPattern('hiopokjsgtkplga',$paras,$user->mobile);
        event(new Registered($user));

        Auth::login($user);
        if (!$theme) {
           alert()->warning('هشدار','لطفا ابتدا یک قالب انتخاب کنید');
           return to_route('theme.choose');
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
